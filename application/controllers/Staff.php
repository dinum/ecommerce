<?php
/**
 * Description of Staff
 *
 * @author Dinum
 */
class Staff extends CI_Controller {
    public $permissions;

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_logged')) {
            redirect(base_url().'login/11');
        } else if($this->session->userdata('user_logged')){
            $this->permissions = $this->session->userdata('permissions');
        }
        
        if(!array_search('view_staff', $this->permissions)&&!array_search('staff_requests', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        
        $this->load->model('Tblusers');
        $this->load->model('TbluserDetails');
        $this->load->model('TblgetData');
        $this->load->model('TblUserRoles');
        $this->load->library('messages');
        $this->load->library('common');
        $this->load->library('validator');
    }
    
    public function index($msgid=""){
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
            
        
        $this->loadHeader();
        $this->load->view('internal/view_staff');
        $this->loadFooter();
    }
    
    public function requests($msgid=""){
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        
        $this->loadHeader();
        $this->load->view('internal/request_staff');
        $this->loadFooter();
    }
    
    public function loadHeader(){
        $this->load->view('template/header',array('permissions'=>$this->permissions));
    }
      
    public function loadFooter(){
        $this->load->view('template/footer');
    }
}
