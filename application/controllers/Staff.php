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
        
        if(!array_search('view_staff', $this->permissions)&&!array_search('staff_requests', $this->permissions)&&!array_search('view_employee', $this->permissions)){
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
        if(!array_search('view_staff', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        $data =  $this->TbluserDetails->get_by_filter(array('status!='=>2));
        
        $this->loadHeader();
        $this->load->view('internal/view_staff',array('datas'=>$data,'msg'=>$msg));
        $this->loadFooter();
    }

    public function view($id){
        if(!array_search('view_employee', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        $data =  $this->TbluserDetails->get_by_ID($id);
        $this->loadHeader();
        $this->load->view('internal/view_employee',array('data'=>$data[0]));
        $this->loadFooter();
    }

    public function approve($id){
        if(isset($id)&&is_numeric($id)){
            $this->TbluserDetails->update_data(array("status"=>1,"updated_date"=>date('Y-m-d H:i:s')),array("id"=>$id));
            $this->Tblusers->update_data(array("status"=>1),array("detail_id"=>$id));
            redirect(base_url().'staff/requests/1');
        } else {
            redirect(base_url().'staff/requests/2');
        }
    }

    public function status($id,$status){
        if(isset($id)&&is_numeric($id)&&is_numeric($status)){
            $this->TbluserDetails->update_data(array("status"=>$status,"updated_date"=>date('Y-m-d H:i:s')),array("id"=>$id));
            $this->Tblusers->update_data(array("status"=>$status),array("detail_id"=>$id));
            redirect(base_url().'staff/1');
        } else {
            redirect(base_url().'staff/2');
        }
    }

    
    public function requests($msgid=""){
        $msg = "";
        if(!array_search('staff_requests', $this->permissions)){
            redirect(base_url().'permission-denied');
        }
        if(isset($msgid)&&$msgid != ""){
    		$msg = $this->messages->returnMessage($msgid);
    	} else {
    		$msg = "";
    	}
        
        $data =  $this->TbluserDetails->get_by_filter(array('status'=>2));

        $this->loadHeader();
        $this->load->view('internal/request_staff',array('datas'=>$data,'msg'=>$msg));
        $this->loadFooter();
    }
    
    public function loadHeader(){
        $this->load->view('template/header',array('permissions'=>$this->permissions));
    }
      
    public function loadFooter(){
        $this->load->view('template/footer');
    }
}
