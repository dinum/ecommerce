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
        $this->loadHeader();
        $this->load->view('internal/view_vacancies',array('msg'=>$msg));
        $this->loadFooter();
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
                $data['status'] = 2;
                
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
