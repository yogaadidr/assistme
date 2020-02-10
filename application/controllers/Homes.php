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
        $saldo = $this->services_model->getSaldo('ALL');
        $data['transaksi'] = $this->services_model->getTransaksiHariIni();
        $data['total_saldo'] = 0;
        $data['title'] = 'Home';
        if($saldo['statusCode'] == 200){
            $data['total_saldo'] = $saldo['data']['total_saldo'];
        }
		$this->loadView('home_view',$data);
    }
}
