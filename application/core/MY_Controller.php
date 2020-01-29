<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
	}

	public function api_url()
	{
		return $this->config->item('api_url');
    }
    
    public function loadViewOnly($view,$data){
		$this->load->view('template/header',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}

	public function loadView($view,$data){
		$this->load->view('template/header',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}
	public function loadViewNavbar($view,$data){
		$this->load->view('template/header',$data);
		$this->load->view('template/navigation',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}
}
