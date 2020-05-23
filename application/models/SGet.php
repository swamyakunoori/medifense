<?php
class SGet extends CI_Model{
    
    // Hospital View
    function hall(){
        $this->db->where('hStatus !=','2');
        $query = $this->db->get('hospitals');
        return $query->result();
    }

    // Company View
    function call(){
        $this->db->from ( 'companies c' );
        $this->db->join ( 'hospitals h', 'h.hId = c.hId');
        $this->db->where('c.cStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }

    // Employees All View
    function eall(){
        $this->db->from ( 'employees e' );
        $this->db->join ( 'companies c', 'c.cId = e.cId');
        $this->db->join ( 'hospitals h', 'h.hId = c.hId');
        $this->db->where('e.eStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }

    // Employees View
    function eview($eId){
        $this->db->from ( 'employees e' );
        $this->db->join ( 'empinfo ei', 'ei.eId = e.eId');
        $this->db->join ( 'companies c', 'c.cId = e.cId');
        $this->db->join ( 'hospitals h', 'h.hId = c.hId');
        $this->db->where('e.eId',$eId);
        $this->db->where('e.eStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }

    // Hospital View
    function aall(){
        $this->db->where('qStatus !=','2');
        $query = $this->db->get('dailyquetions');
        return $query->result();
    }
}
?>