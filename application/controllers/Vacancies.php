<?php
/**
 * @author Dinum
 * Home Controller
 */
class Vacancies extends CI_Controller {
    public $permissions;

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('user_logged')){
            $this->permissions = $this->session->userdata('permissions');
        }
        
        if(!array_search('vacancies_requests', $this->permissions)&&!array_search('view_vacancy', $this->permissions)&&!array_search('add_vacancy', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        
        $this->load->model('Tblusers');
        $this->load->model('TbluserDetails');
        $this->load->model('TblgetData');
        $this->load->model('TblVacancies');
        $this->load->model('TblUserVacancies');
        $this->load->library('messages');
        $this->load->library('common');
        $this->load->library('validator');
    }
    
    public function index($msgid=""){
        if(!array_search('view_vacancy', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
        }
        
        $data = $this->TblVacancies->get_all();

        $this->loadHeader();
        $this->load->view('internal/view_vacancies',array('msg'=>$msg,'datas'=>$data));
        $this->loadFooter();
    }

    public function approve($id){
        if(isset($id)&&is_numeric($id)){
            $this->TblUserVacancies->update_data(array("status"=>1),array("id"=>$id));
            $this->sendemial($id);
            redirect(base_url().'vacancies/requests/1');
        } else {
            redirect(base_url().'vacancies/requests/2');
        }
    }

    public function reject($id){
        //var_dump($id);
        if(isset($id)&&is_numeric($id)){
            $this->TblUserVacancies->update_data(array("status"=>2),array("id"=>$id));
            redirect(base_url().'vacancies/requests/1');
        } else {
            redirect(base_url().'vacancies/requests/2');
        }
    }

    public function sendemial($id){
        $data = $this->TblgetData->getEmployeeEmail($id);

        if(isset($data[0]->email)||!empty($data[0]->email)){
            $to = $data[0]->email;
            $email= "manager@athulaketers.lk";
            $text= "Dear ".$data[0]->fname."\r\n We Selected you, for our  ".$data[0]->tittle."  Campaign";
 
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $message ='<table style="width:100%">
                <tr><td>Text: '.$text.'</td></tr>

            </table>';

            if (@mail($to, $email, $message, $headers))
            {
                $msg = '<div class="alert alert-success">The message has been sent.</div>';
            }else{
                $msg = '<div class="alert alert-danger">The message has been sent.</div>';
            }
        }
    }


    public function status($id,$status){
        if(isset($id)&&is_numeric($id)&&is_numeric($status)){
            $this->TblVacancies->update_data(array("status"=>$status,"updated_date"=>date('Y-m-d H:i:s')),array("id"=>$id));
            redirect(base_url().'vacancies/1');
        } else {
            redirect(base_url().'vacancies/2');
        }
    }
    
    public function add($msgid=""){
        if(!array_search('add_vacancy', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $data = array();
        $errors = array();
        if(isset($_POST['submitdata'])){
            $data['tittle'] = $this->common->clean_text($this->input->post('title'));
            $data['summery'] = $this->common->clean_text($this->input->post('summery'));
            $data['type'] = $this->common->clean_text($this->input->post('type'));
            $data['start'] = $this->converttodate($this->common->clean_text($this->input->post('sdate')));
            $data['end'] = $this->converttodate($this->common->clean_text($this->input->post('edate')));
            $data['location'] = $this->common->clean_text($this->input->post('address'));
            $data['pay_type'] = $this->common->clean_text($this->input->post('moneytype'));
            $data['payment'] = $this->common->clean_text($this->input->post('money'));
            $data['description'] = $this->common->clean_text($this->input->post('description'));
            
            $has_error = false;
//            if(!$this->validator->validate_alphawithSpace($data['tittle'])){
//                $has_error = true;
//                $errors['tittle'] = $this->messages->returnMessage(12);
//                $logString = "Add Vacancy | title validation fail";
//                $this->common->enter_log_logedUser("Guest",$logString,$_POST,0);
//            }
            
            if(!$has_error){
                $data['added_date'] = date('Y-m-d H:i:s');
                $data['status'] = 1;
                
                $id = $this->TblVacancies->insert_data($data);
                
                if($id){
                    $logString = "Add Vacancy | Success | ID=".$id;
                    $this->common->enter_log_logedUser($this->session->userdata('user_name'),$logString,$_POST,$this->session->userdata('user_id'));
                    redirect(base_url().'vacancies/add/5');
                } else {
                   $logString = "Add Vacancy | Error";
                    $this->common->enter_log_logedUser($this->session->userdata('user_name'),$logString,$_POST,$this->session->userdata('user_id'));
                    redirect(base_url().'vacancies/add/6'); 
                }
                
            } else {
                $msg = $this->messages->returnMessage(20);
            }
            
            
        }
        $this->loadHeader();
        $this->load->view('internal/add_vacancy',array('data'=>$data,'msg'=>$msg,'error'=>$errors));
        $this->loadFooter();
    }
    
    public function converttodate($date){
        //12/20/2019 11:59 PM
        return date("Y-m-d H:i:s", strtotime($date));
    }
    
    public function requests($msgid=""){
        if(!array_search('vacancies_requests', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $data = array();

        
        $data = $this->TblgetData->getPendingCUstomersList();

        $this->loadHeader();
        $this->load->view('internal/vacancy_request',array('datas'=>$data,'msg'=>$msg));
        $this->loadFooter();
    } 
    
    public function loadHeader(){
        $this->load->view('template/header',array('permissions'=>$this->permissions));
    }    
  
    public function loadFooter(){
        $this->load->view('template/footer');
    }
            
}
