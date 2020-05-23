<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medifense extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('login');
	}

	public function index($page = 'medifense'){
		if(! file_exists('application/views/'.$page.'.php')) {
			show_404();
		}
		$this->load->view($page);
	}

	public function slogin(){

		$formdata = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
	
		$result = $this->login->slogin($formdata);
		foreach($result as $row){
			$id = $row->id;
		}
		if($result){
			$response_array['status'] = '200';
		}
		else {
			$response_array['status'] = '500';
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response_array));
	}

	public function hlogin(){

		$formdata = array(
			'hUsername' => $this->input->post('username'),
			'hPassword' => $this->input->post('password')
		);
	
		$result = $this->login->hlogin($formdata);
		foreach($result as $row){
			$hId = $row->hId;
		}
		if($result){
			$response_array['status'] = '200';
		}
		else {
			$response_array['status'] = '500';
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response_array));
	}

	public function clogin(){

		$formdata = array(
			'cUsername' => $this->input->post('username'),
			'cPassword' => $this->input->post('password')
		);
	
		$result = $this->login->clogin($formdata);
		foreach($result as $row){
			$cId = $row->cId;
		}
		if($result){
			$response_array['status'] = '200';
		}
		else {
			$response_array['status'] = '500';
		}
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response_array));
	}
	
}
?>