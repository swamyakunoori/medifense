<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Super extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->model('sinsert');
                $this->load->model('sget');
        }

	public function index($page = 'dashboard'){
                if(! file_exists('application/views/sa/'.$page.'.php')) {
                        show_404();
                }
        $data['breadcometitle'] = $page;
        $data['title'] = "Super Admin";

        if($page == "hadd"){
                $result = $this->db->get("hospitals")->result(); 
                if(count($result) == 0){
                        $data['hUsername'] = "MEDIH1";
                }
                else{
                        $data['hUsername'] = "MEDIH".(count($result)+1);
                }
        }
        if($page == "hall" || $page == "cadd" || $page == "eedit"){
                $data["hospitals"] = $this->sget->hall(); 
                $result = $this->db->get("companies")->result(); 
                if(count($result) == 0){
                        $data['cUsername'] = "MEDIC1";
                }
                else{
                        $data['cUsername'] = "MEDIC".(count($result)+1);
                }
        }
        if($page == "call" || $page == "eadd" || $page == "eedit"){
                $data["companies"] = $this->sget->call(); 
        }
        if($page == "eall"){
                $data["employees"] = $this->sget->eall(); 
        }
        if($page == "aall"){
                $data["assessments"] = $this->sget->aall(); 
        }
        if($hospital = $this->input->post('hospital')){
                $data["hospital"] = $hospital;
        }
        if($company = $this->input->post('company')){
                $data["company"] = $company;
        }
        if($employee = $this->input->post('employee')){
                $data["employees"] = $employee;
        }
        if($eId = $this->input->post('eId')){
                $data["employees"] = $this->sget->eview($eId);
        }



        $this->load->view('sa/top');
        $this->load->view('sa/sidebar');
        $this->load->view('sa/header',$data);
        $this->load->view('sa/mobilemenu');
        $this->load->view('sa/breadcome',$data);
        $this->load->view('sa/'.$page,$data);
        $this->load->view('sa/footer');
        $this->load->view('sa/bottom');
        }

        public function hadd(){
                
                $formdata = array(
                        'hUsername' => $this->input->post('hUsername'),
                        'hPassword' => $this->input->post('hMobile'),
                        'hName' => $this->input->post('hName'),
                        'hAddress' => $this->input->post('hAddress'),
                        'hMobile' => $this->input->post('hMobile'),
                        'hStatus' => 1,
                        'createdAt' => date('Y-m-d H:i:s'),
                        'modifiedAt' => date('Y-m-d H:i:s')
                );
                
		$result = $this->sinsert->hadd($formdata);
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Submit Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Insert Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function hedit(){
                
                $formdata = array(
                        'hUsername' => $this->input->post('hUsername'),
                        'hName' => $this->input->post('hName'),
                        'hAddress' => $this->input->post('hAddress'),
                        'hMobile' => $this->input->post('hMobile'),
                        'modifiedAt' => date('Y-m-d H:i:s')
                );
                
		$result = $this->sinsert->hedit($formdata,$this->input->post('hId'));
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Update Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Update Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function hactive(){
                $hId = $this->input->post('hId');
                if($this->input->post('hStatus') == 1){
                        $hStatus = 0;
                }
                else if($this->input->post('hStatus') == 0){
                        $hStatus = 1;
                }
                else if($this->input->post('hStatus') == 2){
                        $hStatus = 2;
                }
                $result = $this->sinsert->hactive($hId,$hStatus);
		if($result){
			redirect('1/hall');
		}
        }

        public function cadd(){
                
                $formdata = array(
                        'hId' => $this->input->post('hId'),
                        'cUsername' => $this->input->post('cUsername'),
                        'cPassword' => $this->input->post('cMobile'),
                        'cName' => $this->input->post('cName'),
                        'cAddress' => $this->input->post('cAddress'),
                        'cNoEmp' => $this->input->post('cNoEmp'),
                        'cMobile' => $this->input->post('cMobile'),
                        'cStatus' => 1,
                        'createdAt' => date('Y-m-d H:i:s'),
                        'modifiedAt' => date('Y-m-d H:i:s')
		);
		$result = $this->sinsert->cadd($formdata);
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Submit Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Insert Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function cedit(){
                
                $formdata = array(
                        'hId' => $this->input->post('hId'),
                        'cUsername' => $this->input->post('cUsername'),
                        'cPassword' => $this->input->post('cMobile'),
                        'cName' => $this->input->post('cName'),
                        'cAddress' => $this->input->post('cAddress'),
                        'cNoEmp' => $this->input->post('cNoEmp'),
                        'cMobile' => $this->input->post('cMobile'),
                        'modifiedAt' => date('Y-m-d H:i:s')
		);
		$result = $this->sinsert->cedit($formdata,$this->input->post('cId'));
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Update Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Update Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function cactive(){
                $cId = $this->input->post('cId');
                if($this->input->post('cStatus') == 1){
                        $cStatus = 0;
                }
                else if($this->input->post('cStatus') == 0){
                        $cStatus = 1;
                }
                else if($this->input->post('cStatus') == 2){
                        $cStatus = 2;
                }
                $result = $this->sinsert->cactive($cId,$cStatus);
		if($result){
			redirect('1/call');
		}
        }

        public function eadd(){
                
                $formdata = array(
                        'cId' => $this->input->post('cId'),
                        'empId' => $this->input->post('empId'),
                        'eName' => $this->input->post('eName'),
                        'eMobile' => $this->input->post('eMobile'),
                        'eDesignation' => $this->input->post('eDesignation'),
                        'eStatus' => 1,
                        'createdAt' => date('Y-m-d H:i:s'),
                        'modifiedAt' => date('Y-m-d H:i:s')
		);
		$result = $this->sinsert->eadd($formdata);
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Submit Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Insert Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function eedit(){
                
                $formdata = array(
                        'eId' => $this->input->post('eId'),
                        'cId' => $this->input->post('cId'),
                        'empId' => $this->input->post('empId'),
                        'eName' => $this->input->post('eName'),
                        'eMobile' => $this->input->post('eMobile'),
                        'eDesignation' => $this->input->post('eDesignation')
                );

                $formdataa = array(
                        'eId' => $this->input->post('eId'),
                        'eAddress' => $this->input->post('eAddress'),
                        'eAge' => $this->input->post('eAge'),
                        'eGender' => $this->input->post('eGender'),
                        'eCoronaZone' => $this->input->post('eCoronaZone'),
                        'eCoronaStatus' => $this->input->post('eCoronaStatus'),
                        'eDisease' => $this->input->post('eDisease'),
                        'eMedicines' => $this->input->post('eMedicines'),
                        'eHealthCondition' => $this->input->post('eHealthCondition'),
                        'eTravel' => $this->input->post('eTravel'),
                        'travelMode' => $this->input->post('travelMode'),
                        'eSmoking' => $this->input->post('eSmoking'),
                        'eDrinking' => $this->input->post('eDrinking'),
                        'ePregnant' => $this->input->post('ePregnant')
                );
                $result = $this->sinsert->eedit($formdata,$this->input->post('eId'));
                $resultt = $this->sinsert->eeditt($formdataa,$this->input->post('eId'));
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Submit Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Insert Error';
                }
                
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function eactive(){
                $eId = $this->input->post('eId');
                if($this->input->post('eStatus') == 1){
                        $eStatus = 0;
                }
                else if($this->input->post('eStatus') == 0){
                        $eStatus = 1;
                }
                else if($this->input->post('eStatus') == 2){
                        $eStatus = 2;
                }
                $result = $this->sinsert->eactive($eId,$eStatus);
		if($result){
			redirect('1/eall');
		}
        }

        public function aadd(){
                
                $formdata = array(
                        'qName' => $this->input->post('qName'),
                        'qAnswer' => $this->input->post('qAnswer'),
                        'qStatus' => 1,
                        'createdAt' => date('Y-m-d H:i:s'),
                        'modifiedAt' => date('Y-m-d H:i:s')
                );
                
		$result = $this->sinsert->aadd($formdata);
		if($result){
			$response_array['status'] = '200';
			$response_array['message'] = 'Submit Successfully';
		}
		else {
			$response_array['status'] = '500';
			$response_array['message'] = 'Data Insert Error';
                }
                $this->output
                        ->set_content_type('application/json')
			->set_output(json_encode($response_array));
        }

        public function qactive(){
                $qId = $this->input->post('qId');
                if($this->input->post('qStatus') == 1){
                        $qStatus = 0;
                }
                else if($this->input->post('qStatus') == 0){
                        $qStatus = 1;
                }
                else if($this->input->post('qStatus') == 2){
                        $qStatus = 2;
                }
                $result = $this->sinsert->qactive($qId,$qStatus);
		if($result){
			redirect('1/aall');
		}
        }
	
}
?>