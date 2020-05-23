<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

	public function index($page = 'dashboard'){

        if(!$this->session->userdata('sessionhospital')){
                redirect('0/hlogin');
        }

	if(! file_exists('application/views/ha/'.$page.'.php')) {
		show_404();
        }

        $data['breadcometitle'] = $page;
        $data['title'] = "Hospital Admin";
        $this->load->view('ha/top');
        $this->load->view('ha/sidebar');
        $this->load->view('ha/header',$data);
        $this->load->view('ha/mobilemenu');
        $this->load->view('ha/breadcome',$data);
        $this->load->view('ha/'.$page);
        $this->load->view('ha/footer');
        $this->load->view('ha/bottom');
        }
        
        function logout(){
                $this->session->unset_userdata('sessionhospital');
                redirect('0/hlogin');
        }
	
}
?>