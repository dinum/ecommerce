<?php
/**
 * @author Dinum
 * Home Controller
 */
class Home extends CI_Controller {
    
    public $permissions;

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('user_logged')){
            $this->permissions = $this->session->userdata('permissions');
        }
        
        $this->load->model('Tblusers');
        $this->load->model('TbluserDetails');
        $this->load->model('TblgetData');
        $this->load->model('TblUserRoles');
        $this->load->model('TblVacancies');
        $this->load->model('TblUserVacancies');
        $this->load->library('messages');
        $this->load->library('common');
        $this->load->library('validator');
    }

    public function index($msgid="") {
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
        }
        $data = $this->TblVacancies->get_by_filter(array('status'=>1),array('added_date'=>'DESC'));

        $registed = array("0");

        if ($this->session->userdata('user_logged')) {
            $registeddata = $this->TblUserVacancies->get_by_filter(array('user_id'=>$this->session->userdata('user_id')));

            if(isset($registeddata)&&$registeddata&&sizeof($registeddata)>0){
                foreach($registeddata as $registedda){
                    array_push($registed,$registedda->vacancy_id);
                }
            }
        } 

        $this->loadHeader();
        $this->load->view('external/home',array('datas'=>$data,'msg'=>$msg,"applied"=>$registed));
        $this->loadFooter();
    }

    public function view_vacancy($id){
        if (!$this->session->userdata('user_logged')) {
            redirect(base_url().'login/11');
        }
        
        $data = $this->TblVacancies->get_by_filter(array('status'=>1,'id'=>$id));

        if(!isset($data[0])||empty($data[0]->id)){
            redirect(base_url().'index/11');
        }

        $registed = array("0");
        $registeddata = array();

        if ($this->session->userdata('user_logged')) {
            $registeddata = $this->TblUserVacancies->get_by_filter(array('user_id'=>$this->session->userdata('user_id'),'vacancy_id'=>$data[0]->id));

            if(isset($registeddata)&&$registeddata&&sizeof($registeddata)>0){
                foreach($registeddata as $registedda){
                    array_push($registed,$registedda->vacancy_id);
                }
            }
        } 

        $employees = $this->TblgetData->getEmployeesByVacancy($id);

        $this->loadHeader();
        $this->load->view('external/vacancy',array('data'=>$data[0],"applied"=>$registed,'registeddata'=>$registeddata[0],'employees'=>$employees));
        $this->loadFooter();

    }

    public function apply($id){
        if (!$this->session->userdata('user_logged')) {
            redirect(base_url().'login/11');
        } else if(!array_search('apply_vacancy', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        
        $dataD = $this->TblVacancies->get_by_filter(array('status'=>1,'id'=>$id));

        if(!isset($dataD[0])||empty($dataD[0]->id)){
            redirect(base_url().'home/index/11');
        }

        $data = array(
            'user_id'=> $this->session->userdata('user_id'),
            'vacancy_id' =>$dataD[0]->id,
            'status' => 0
        );
        $ins_id = $this->TblUserVacancies->insert_data($data);

        if($ins_id){
            $logString = "apply for vacancy | Success | ID=".$id;
            $this->common->enter_log_logedUser($this->session->userdata('user_name'),$logString,$_POST,$this->session->userdata('user_id'));
            redirect(base_url().'home/index/5');
        } else {
            $logString = "apply for vacancy | Error";
            $this->common->enter_log_logedUser($this->session->userdata('user_name'),$logString,$_POST,$this->session->userdata('user_id'));
            redirect(base_url().'home/index/6'); 
        }
    }


    
    public function aboutus(){
        $this->loadHeader();
        $this->load->view('external/aboutus');
        $this->loadFooter();
    }
    
    public function contact(){
        $msg = "";
        if(isset($_POST['sendmailb'])){
            $to = 'demo@spondonit.com';
            $firstname = $_POST["fname"];
            $email= $_POST["email"];
            $text= $_POST["message"];
            $phone= $_POST["phone"];

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $message ='<table style="width:100%">
                <tr>
                    <td>'.$firstname.'  '.$laststname.'</td>
                </tr>
                <tr><td>Email: '.$email.'</td></tr>
                <tr><td>phone: '.$phone.'</td></tr>
                <tr><td>Text: '.$text.'</td></tr>

            </table>';

            if (@mail($to, $email, $message, $headers))
            {
                $msg = '<div class="alert alert-success">The message has been sent.</div>';
            }else{
                $msg = '<div class="alert alert-danger">The message has been sent.</div>';
            }
        }
        $this->loadHeader();
        $this->load->view('external/contact',array('msg'=>$msg));
        $this->loadFooter();
    }
    
    public function account($msgid=""){
        if (!$this->session->userdata('user_logged')) {
            redirect(base_url().'login/11');
        }
        $errors = array();
        $msg = "";
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $data = array();
        $dataDb = $this->TbluserDetails->get_by_ID($this->session->userdata('user_id'));        
        if(isset($_POST['submitdata'])){
            $data = array();
            $data['fname'] = $this->common->clean_text($this->input->post('first_name'));
            $data['mname'] = $this->common->clean_text($this->input->post('middle_name'));
            $data['lname'] = $this->common->clean_text($this->input->post('last_name'));
            $data['email'] = $this->common->clean_text($this->input->post('email'));
            $data['mobile'] = $this->common->clean_text($this->input->post('mobile'));
            $data['address'] = $this->common->clean_text($this->input->post('address'));
            $data['qualification'] = $this->common->clean_text($this->input->post('qualification'));
            $customerId = $this->common->clean_text($this->input->post('cid'));
            
            $has_error = false;
            if(!$this->validator->validate_alpha($data['fname'])){
                $has_error = true;
                $errors['fname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$this->validator->validate_alpha($data['mname'])){
                $has_error = true;
                $errors['mname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$this->validator->validate_alpha($data['lname'])){
                $has_error = true;
                $errors['lname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }                
                        
            if(!$has_error){
                $data['updated_date'] = date('Y-m-d H:i:s');
                
                $id = $this->TbluserDetails->update_data($data,array('id'=>$customerId));
                
                if($id){                    
                    
                    $uaccount = array(
                        'name' => $data['fname'],
                        'email' => $data['email']
                    );
                    
                    $userid = $this->Tblusers->update_data($uaccount,array('detail_id'=>$customerId));
                    
                   
                    $logString = "Updated User | Success | ID=".$id;
                    $this->common->enter_log_logedUser($data['fname'],$logString,$_POST,$userid);
                    redirect(base_url().'home/account/1');
                } else {
                    $logString = "Updated User | Database Error";
                    $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
                    redirect(base_url().'home/account/2');
                }
                
            } else {
                $msg = $this->messages->returnMessage(20);
            }
            
            
        } else {
            $data['fname'] = $dataDb[0]->fname;
            $data['mname'] = $dataDb[0]->mname;
            $data['lname'] = $dataDb[0]->lname;
            $data['email'] = $dataDb[0]->email;
            $data['mobile'] = $dataDb[0]->mobile;
            $data['address'] = $dataDb[0]->address;
            $data['qualification'] = $dataDb[0]->qualification;
        }        

        $this->loadHeader();
        $this->load->view('internal/account',array('data'=>$data,'error'=>$errors,'msg'=>$msg,'cid'=>$dataDb[0]->id));
        $this->loadFooter();
    }
    
    public function signup($msgid=""){
        $errors = array();
        $msg = "";
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $data = array();
        if(isset($_POST['submitdata'])){
            
            $data['fname'] = $this->common->clean_text($this->input->post('first_name'));
            $data['mname'] = $this->common->clean_text($this->input->post('middle_name'));
            $data['lname'] = $this->common->clean_text($this->input->post('last_name'));
            $data['email'] = $this->common->clean_text($this->input->post('email'));
            $data['mobile'] = $this->common->clean_text($this->input->post('mobile'));
            $data['address'] = $this->common->clean_text($this->input->post('address'));
            $data['qualification'] = $this->common->clean_text($this->input->post('qualification'));
            $username = $this->common->clean_text($this->input->post('uname'));
            $password = $this->common->clean_text($this->input->post('password'));
            $cpassword = $this->common->clean_text($this->input->post('cpassword'));
            
            $has_error = false;
            if(!$this->validator->validate_alpha($data['fname'])){
                $has_error = true;
                $errors['fname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$this->validator->validate_alpha($data['mname'])){
                $has_error = true;
                $errors['mname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$this->validator->validate_alpha($data['lname'])){
                $has_error = true;
                $errors['lname'] = $this->messages->returnMessage(12);
                $logString = "Add User | name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
                        
            if(!$this->validator->validate_alpha($username)){
                $has_error = true;
                $errors['uname'] = $this->messages->returnMessage(15);
                $logString = "Add User | user name validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            } else {
                $unameCount = $this->Tblusers->get_by_filter(array('username'=>$username));
                if(isset($unameCount)&& $unameCount && sizeof($unameCount)>0){
                    $has_error = true;
                    $errors['uname'] = $this->messages->returnMessage(16);
                    $logString = "Add User | user name Already available";
                    $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
                }
            }
                        
            if(!$this->validator->validate_pw($password)){
                $has_error = true;
                $errors['pw'] = $this->messages->returnMessage(17);
                $logString = "Add User | password validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$this->validator->validate_pw($cpassword)|| $password!=$cpassword){
                $has_error = true;
                $errors['rpw'] = $this->messages->returnMessage(18);
                $logString = "Add User | Confirm password validation fail";
                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
            }
            
            if(!$has_error){
                $data['added_date'] = date('Y-m-d H:i:s');
                $data['status'] = 2;
                
                $id = $this->TbluserDetails->insert_data($data);
                
                if($id){                    
                    
                    $uaccount = array(
                        'detail_id' => $id,
                        'name' => $data['fname'],
                        'email' => $data['email'],
                        'username' => $username,
                        'password' => md5($password),
                        'added_date' =>  date('Y-m-d H:i:s'),
                        'status' => 0
                    );
                    
                    $userid = $this->Tblusers->insert_data($uaccount);
                    
                    $insert2 = array(
                        'user_id' => $userid,
                        'role_id' => 2
                    );
                    $this->TblUserRoles->insert_data($insert2);
                    
                    $logString = "Add User | Success | ID=".$id;
                    $this->common->enter_log_logedUser($data['fname'],$logString,$_POST,$userid);
                    redirect(base_url().'signup/21');
                } else {
                    $logString = "Add User | Database Error";
                    $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
                    redirect(base_url().'signup/6');
                }
                
            } else {
                $msg = $this->messages->returnMessage(20);
            }
            
        }
        
        $this->loadHeader();
        $this->load->view('external/signup',array('error'=>$errors,'msg'=>$msg,'data'=>$data));
        $this->loadFooter();
    }

    public function loadHeader(){
        $this->load->view('template/header',array('permissions'=>$this->permissions));
    }
    
    public function permission(){
        $this->loadHeader();
        $this->load->view('external/permission');
        $this->loadFooter();
    }
      
    public function loadFooter(){
        $this->load->view('template/footer');
    }
}
