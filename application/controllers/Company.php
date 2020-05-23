<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	public function index($page = 'dashboard'){
		if(! file_exists('application/views/ca/'.$page.'.php')) {
			show_404();
                }
        $data['breadcometitle'] = $page;
        $data['title'] = "Company Admin";
        $this->load->view('ca/top');
        $this->load->view('ca/sidebar');
        $this->load->view('ca/header',$data);
        $this->load->view('ca/mobilemenu');
        $this->load->view('ca/breadcome',$data);
        $this->load->view('ca/'.$page);
        $this->load->view('ca/footer');
        $this->load->view('ca/bottom');
	}
	
}
?>