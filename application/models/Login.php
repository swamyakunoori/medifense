<?php
class Login extends CI_Model{

    function slogin($formdata){
        $this->db->where($formdata);
        $query = $this->db->get('super');
        return $query->result();
    }

    function hlogin($formdata){
        $this->db->select('hId');
        $this->db->where($formdata);
        $query = $this->db->get('hospitals');
        return $query->result();
    }

    function clogin($formdata){
        $this->db->select('cId');
        $this->db->where($formdata);
        $query = $this->db->get('companies');
        return $query->result();
    }
}
?>