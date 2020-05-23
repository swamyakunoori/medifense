<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mobile');
    }
    
    public function companies(){
        $result = $this->mobile->companies();
        if($result){
            $data['status'] = "200";
    		$data['data'] = $result;
        }
        else{
            $data['status'] = "500";
    		$data['data'] = 'No Companies';
        }
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function verifyEmoplyee(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    if(!empty($edata)){
	        $cDate = $edata->cDate;
	        $eMobile = $edata->eMobile;
	        $otp = rand(999, 9999);
	        
            $result = $this->mobile->verifyEmoplyee($edata);
            $symptoms = $this->mobile->symptoms();
            if($result){
                
                foreach($result as $row){
                    $eStatus = $row->eStatus;
                    $eId = $row->eId;
                }
                
                if($eStatus == 1){
                    $result = $this->mobile->empdata($eId);
                }
                $count = $this->mobile->countasses($eId);
                $today = $this->mobile->assessment($cDate,$eId);
                
                
                
                $url = 'http://sms.teleosms.com//api/mt/SendSMS';
            	$username = 'f2hservices';
            	$password = '12345';
            	$from ='FMTOHM';
            	$message = "Medifanse OTP is ".$otp;
                	
            	$request = $url.'?user='.$username.'&password='.$password.'&senderid='.$from.'&channel=Trans&DCS=0&flashsms=0&number='.urlencode($eMobile).'&text='.urlencode($message).'&route=2';
            	$ch = curl_init();
            	curl_setopt($ch, CURLOPT_URL, $request);
            	curl_setopt($ch, CURLOPT_HEADER, 0);
            	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            	$response = curl_exec($ch);
            	curl_close($ch);
                	
            	$data['status'] = "200";
            	$data['OTP'] = $otp;
            	$data['eStatus'] = $eStatus;
            	$data['todayAssess'] = $today;
            	$data['totalAssess'] = $count;
            	$data['data'] = $result;
            	$data['symptoms'] = $symptoms;
                
            }
            else{
                $data['status'] = "500";
        		$data['data'] = 'Did not find Emoplyee';
            }
	    }
	    else{
	        $data['status'] = "500";
            $data['data'] = 'Please Send Correct Data';
	    }
	    $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function emp(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    $cDate = $edata->cDate;
	    $eId = $edata->eId;
	    
	    $count = $this->mobile->countasses($eId);
        $today = $this->mobile->assessment($cDate,$eId);
        $symptoms = $this->mobile->symptoms();
        $prescription = $this->mobile->prescription($cDate,$eId);
        
        $data['status'] = "200";
        $data['todayAssess'] = $today;
        $data['totalAssess'] = $count;
        $data['prescription'] = $prescription;
        
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }

    public function empinfo(){
	    
	    if(isset($_POST['eId'])){
	        
	        $symptoms = $this->mobile->symptoms();
	        
	        $eId = $_POST['eId'];
	        
	        if(isset($_FILES['eImage']['name'])){
	            $tempname = $_FILES["eImage"]["tmp_name"];
	            $extension = explode(".",$_FILES["eImage"]["name"]);
	            $filename= date('dmY')."_".$eId.".".$extension[1];
	            if (isset($_FILES["eImage"]) )  {
	                if (move_uploaded_file($tempname,"upload/".$filename)  )  {
	                    $data['image'] = "upload image";
	                }
	            }
	        }
	        
	        $emp = array(
	            'eId' => $eId,
	            'eImage' => $filename,
	            'eAddress' => $_POST['eAddress'],
	            'eAge' => $_POST['eAge'],
	            'eGender' => $_POST['eGender'],
	            'eCoronaZone' => $_POST['eCoronaZone'],
	            'eCoronaStatus' => $_POST['eCoronaStatus'],
	            'eDisease' => $_POST['eDisease'],
	            'eMedicines' => $_POST['eMedicines'],
	            'eHealthCondition' => $_POST['eHealthCondition'],
	            'eTravel' => $_POST['eTravel'],
	            'travelMode' => $_POST['travelMode'],
	            'eSmoking' => $_POST['eSmoking'],
	            'eDrinking' => $_POST['eDrinking'],
	            'ePregnant' => $_POST['ePregnant']
	            );
	     
            $insert = $this->mobile->empinfo($emp);
            $status = $this->mobile->statusEmoplyee($eId,1);
            $count = $this->mobile->countasses($eId);
            $empData = $this->mobile->empdata($eId);
            $today = $this->mobile->assessment($_POST['cDate'],$eId);
            if($insert){
                $data['status'] = "200";
                $data['today'] = $today;
                $data['count'] = $count;
            	$data['data'] = $empData;
            	$data['symptoms'] = $symptoms;
            }
            else{
                $data['status'] = "500";
                $data['data'] = "Data insert error";
            }
	    }
	    else{
	        $data['status'] = "500";
            $data['data'] = "No input Data ";
	    }
	    $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function empfamily(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    if(!empty($edata)){
            $result = $this->mobile->empfamily($edata);
            if($result){
                $data['status'] = "200";
            	$data['message'] = "success";
            	$data['data'] = "Family Member Added";
            }
            else{
            $data['status'] = "500";
        	$data['message'] = "error";
        	$data['data'] = 'Enter correct details';
            }
	    }
	    $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function quetions(){
        $res = $this->mobile->quetions();
        if($res){
            $data['status'] = "200";
            $data['message'] = "success";
            $data['data'] = $res;
        }
        else{
            $data['status'] = "500";
        	$data['message'] = "error";
        	$data['data'] = 'No Assessment';
        }
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function empasses(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    if(!empty($edata)){
	        
	        $eId = $edata->eId;
	        $cDate = $edata->cDate;
	        
	        foreach($edata->assessment as $row){
	            $assess[] = array(
	            'eId' => $eId,
	            'qId' => $row->qId,
	            'qAnswer' => $row->qAnswer
	            );
	        }
	            
	        $result = $this->mobile->empasses($assess);
	        if($result){
	            $count = $this->mobile->countasses($eId);
                $today = $this->mobile->assessment($cDate,$eId);
	            
	            $data['status'] = "200";
            	$data['todayAssess'] = $today;
            	$data['totalAssess'] = $count;
            	
	        }
	    }
	    else{
	        $data['status'] = "500";
	        $data['data'] = 'No input Data';
	    }
	    $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function logs(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    $count = $this->mobile->countasses($edata->eId);
        $res = $this->mobile->logs($edata->eId);
	    if($res){
	        $data['status'] = "200";
            $data['message'] = "success";
            $data['totalAssess'] = $count;
            $data['totaldata'] = $res;
        }
        else{
            $data['status'] = "500";
            $data['message'] = "error";
            $data['data'] = 'No Data';
        }
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
    }
    
    public function emphealth(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    $result = $this->mobile->emphealth($edata->eId);
	    
	    if($result){
	        $data['status'] = "200";
            $data['report'] = $result;
        }
        else{
            $data['status'] = "500";
            $data['data'] = 'you perfect';
        }
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
			
    }
    
    public function companyhealth(){
        $obj = file_get_contents('php://input');
	    $edata = json_decode($obj);
	    $result = $this->mobile->companyhealth($edata->cId);
	    $result1 = $this->mobile->empcompany($edata->cId);
	    
	    $data['status'] = "200";
        $data['totalemp'] = $result1;
        $data['unhealthemp'] = $result;
            
        $this->output
            ->set_content_type('application/json')
			->set_output(json_encode($data));
			
    }
    
    
}
?>
