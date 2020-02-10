<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('services_model');
    }
    
    public function index(){
        
    }
    
    public function login()
	{
        $dataLogin = $this->session->userdata('dataLogin');
        $data['title'] = 'Login';
        if($dataLogin != null){
            redirect('home');
        }else{
            $this->loadView('login_view',$data);
        }
    }
    public function auth()
	{
        $data['username'] = $this->input->post("username");
        $data['password'] = $this->input->post("password");
        $cek = $this->services_model->loginUser($data);
        $this->session->set_userdata('dataLogin',$cek['data']);
        if($cek['statusCode'] == 200){
            redirect("home");
        }else{
            redirect("login");
        }
	}
}
