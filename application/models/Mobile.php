<?php

class Mobile extends CI_Model{
    
    // Company Data
    function companies(){
        $this->db->from ( 'companies c' );
        $this->db->join ( 'hospitals h', 'h.hId = c.hId');
        $this->db->where('c.cStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Verify Emoplyee
    function verifyEmoplyee($edata){
        $this->db->from ( 'employees e, companies c');
        $this->db->where('c.cId',$edata->cId);
        $this->db->where('e.eMobile',$edata->eMobile);
        $this->db->where('e.eStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }
    
    //Status Employee
    function statusEmoplyee($eId,$eStatus){
        $this->db->set('eStatus', $eStatus);
        $this->db->where('eId',$eId);
        $query = $this->db->update('employees');
        return $query;
    }
    
    //Store Emplo Info
    function empinfo($edata){
        $query = $this->db->insert('empinfo',$edata);
        return $query;
    }
    
    function empdata($eId){
        $this->db->from ( 'employees e');
        $this->db->join ( 'empinfo ee', 'ee.eId = e.eId');
        $this->db->where('e.eId',$eId);
        $this->db->where('e.eStatus !=','2');
        $query = $this->db->get();
        return $query->result();
    }
    
    function assessment($cDate,$eId){
        $this->db->where('eId',$eId);
        $this->db->where("DATE_FORMAT(createdAt,'%d-%m-%Y')",$cDate);
        $query = $this->db->get('dailyreport');
        return $query->result();
    }
    
    //Store Emplo Family Info
    function empfamily($edata){
        $query = $this->db->insert('empfamily',$edata);
        return $query;
    }
    
    //Daily Assessments
    function quetions(){
        $this->db->where('qStatus','1');
        $query = $this->db->get('dailyquetions');
        return $query->result();
    }
    
    //Daily Assesments
    function empasses($edata){
        $query = $this->db->insert_batch('dailyreport',$edata);
        return $query;
    }
    
    //Daily Report
    function dailyreport($eId){
        $this->db->where('eId',$eId);
        $query = $this->db->get('dailyreport');
        return $query->result();
    }
    
    //Count Assesment
    function countasses($eId){
        $this->db->where('eId',$eId);
        $this->db->group_by("DATE_FORMAT(createdAt, '%Y-%m-%d')");
	    $query = $this->db->get("dailyreport");
	    return $query->num_rows();
    }
    
    //logs
    function logs($eId){
        $this->db->where('eId',$eId);
        $this->db->order_by("DATE_FORMAT(createdAt, '%Y-%m-%d')");
	    $query = $this->db->get("dailyreport");
	    return $query->result();
    }
    
    function symptoms(){
        $query = $this->db->get('symptoms');
        return $query->result();
    }
    
    function prescription($cDate,$eId){
        $this->db->where('eId',$eId);
        $this->db->where("DATE_FORMAT(uptoTablet, '%d-%m-%Y') >=", $cDate);
        $this->db->where("DATE_FORMAT(createdAt, '%d-%m-%Y') <=", $cDate);
        $query = $this->db->get('empstatus');
        return $query->result();
    }
    function emphealth($eId){
        $this->db->where('eId',$eId);
        $query = $this->db->get('empstatus');
        return $query->result();
    }
    
    function companyhealth($cId){
        $this->db->where('cId',$cId);
        $this->db->group_by('eId');
        $query = $this->db->get('empstatus');
        return $query->num_rows();
    }
    
    function empcompany($cId){
        $this->db->where('cId',$cId);
        $query = $this->db->get('employees');
        return $query->num_rows();
    }
}

?>