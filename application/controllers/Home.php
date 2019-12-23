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
        $this->load->library('messages');
        $this->load->library('common');
        $this->load->library('validator');
    }

    public function index() {
        $this->loadHeader();
        $this->load->view('external/home');
        $this->loadFooter();
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
    
    public function account(){
        if (!$this->session->userdata('user_logged')) {
            redirect(base_url().'login/11');
        }

        $data = $this->TbluserDetails->get_by_ID($this->session->userdata('user_id'));

        $this->loadHeader();
        $this->load->view('internal/account',array('data'=>$data[0]));
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
