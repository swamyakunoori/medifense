<?php
class SInsert extends CI_Model{
    
    // Hospital Add
    function hadd($formdata){
        $query = $this->db->insert('hospitals',$formdata);
        return $query;
    }

    // Hospital Edit
    function hedit($formdata,$hId){
        $this->db->where('hId',$hId);
        $query = $this->db->update('hospitals',$formdata);
        return $query;
    }

    // Hospital Status
    function hactive($hId,$hStatus){
        $this->db->set('hStatus', $hStatus);
        $this->db->where('hId',$hId);
        $query = $this->db->update('hospitals');
        return $query;
    }

    // Company Add
    function cadd($formdata){
        $query = $this->db->insert('companies',$formdata);
        return $query;
    }

    // Company Edit
    function cedit($formdata,$cId){
        $this->db->where('cId',$cId);
        $query = $this->db->update('companies',$formdata);
        return $query;
    }

    // Company Status
    function cactive($cId,$cStatus){
        $this->db->set('cStatus', $cStatus);
        $this->db->where('cId',$cId);
        $query = $this->db->update('companies');
        return $query;
    }

    // Employee Add
    function eadd($formdata){
        $query = $this->db->insert('employees',$formdata);
        return $query;
    }

    // Employee Edit
    function eedit($formdata,$eId){
        $this->db->where('eId',$eId);
        $query = $this->db->update('employees',$formdata);
        return $query;
    }

    // Employee Info Edit
    function eeditt($formdataa,$eId){
        $this->db->where('eId',$eId);
        $query = $this->db->update('empinfo',$formdataa);
        return $query;
    }

    // Employee Status
    function eactive($eId,$eStatus){
        $this->db->set('eStatus', $eStatus);
        $this->db->where('eId',$eId);
        $query = $this->db->update('employees');
        return $query;
    }

    // Assessment Add
    function aadd($formdata){
        $query = $this->db->insert('dailyquetions',$formdata);
        return $query;
    }

    // Assessment Status
    function qactive($qId,$qStatus){
        $this->db->set('qStatus', $qStatus);
        $this->db->where('qId',$qId);
        $query = $this->db->update('dailyquetions');
        return $query;
    }
}
?>