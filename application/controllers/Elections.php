<?php

/**
 * @author Dinum
 * Login Controller
 */
class Elections extends CI_Controller {
    public $permissions;

    public function __construct() {
        parent::__construct();
        if($this->session->userdata('user_logged')){
            $this->permissions = $this->session->userdata('permissions');
        }
        $this->load->model('TblElectionCatogories');
        $this->load->model('TblDivisions');
        $this->load->model('TblParty');
        $this->load->model('TblPartyCandidates');
        $this->load->model('TblPollingDivisions');
        $this->load->model('TblResult');
        $this->load->library('messages');
        $this->load->library('common');
    }
    
    public function index($msgid=""){
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $elections = $this->TblElectionCatogories->get_all_active_records();
        $this->loadHeader();
        $this->load->view('internal/elections',array('elections'=>$elections,'msg'=>$msg));
        $this->loadFooter();
    }
    
    public function add($category=""){
        if(!empty($category)){
            
        } else {
            $logString = "Add Election | Category Missing";
            $this->common->enter_log_logedUser($this->session->userdata('user_name'),$logString,$_POST,$this->session->userdata('user_id'));
            redirect(base_url().'elections/19');
        }
    }
    
    public function loadHeader(){
        $this->load->view('template/header',array('permissions'=>$this->permissions));
    }
      
    public function loadFooter(){
        $this->load->view('template/footer');
    }
}
