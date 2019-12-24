<?php
/**
 * @author Dinum
 * Login Controller
 */
class TblgetData extends CI_Model {
    public function __construct(){
        parent::__construct();
    }
    
    function getPermissionsByUser($id) {
        $this->db->select("tblpermission.permission,tblpermission.special_permission");
        $this->db->from("user_roles");
        $this->db->join("permission_roles", "user_roles.role_id = permission_roles.role_id");
        $this->db->join("tblpermission", "permission_roles.permission_id = tblpermission.id");
        $this->db->where("user_roles.user_id", $id);
        $query = $this->db->get();
        if (isset($query) && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    public function getPendingCUstomersList(){
        $this->db->select("*,tbl_user_vacancy.id as id,tbl_user_details.id as userid,tbl_vacancies.id as vacancyid");
        $this->db->from("tbl_user_vacancy");
        $this->db->join("tbl_user_details", "tbl_user_vacancy.user_id = tbl_user_details.id");
        $this->db->join("tbl_vacancies", "tbl_user_vacancy.vacancy_id = tbl_vacancies.id");
        $this->db->where("tbl_user_vacancy.status", 0);
        $query = $this->db->get();
        if (isset($query) && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    public function getEmployeeEmail($id){        
        $this->db->select("tbl_user_details.*,tbl_vacancies.tittle");
        $this->db->from("tbl_user_vacancy");
        $this->db->join("tbl_user_details", "tbl_user_vacancy.user_id = tbl_user_details.id");
        $this->db->join("tbl_vacancies", "tbl_user_vacancy.vacancy_id = tbl_vacancies.id");
        $this->db->where("tbl_user_vacancy.id", $id);
        $query = $this->db->get();
        if (isset($query) && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

    public function getEmployeesByVacancy($id){        
        $this->db->select("tbl_user_details.*,tbl_user_vacancy.status as vacStatus");
        $this->db->from("tbl_user_vacancy");
        $this->db->join("tbl_user_details", "tbl_user_vacancy.user_id = tbl_user_details.id");
        $this->db->join("tbl_vacancies", "tbl_user_vacancy.vacancy_id = tbl_vacancies.id");
        $this->db->where("tbl_user_vacancy.vacancy_id", $id);
        $query = $this->db->get();
        if (isset($query) && $query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }

}
