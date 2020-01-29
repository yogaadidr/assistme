<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('services_model');
        $dataLogin = $this->session->userdata('dataLogin');
        if($dataLogin == null){
            redirect('login');
        }
	}

	public function index()
	{
		$this->loadView('home_view','');
    }

    public function logout(){
        $this->session->unset_userdata('dataLogin',$cek['data']);
        redirect('login');
    }

}
