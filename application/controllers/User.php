<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

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
        $data['tanggal'] = $this->getDateFromString(date('m/d/Y'));
        $data['halaman_sebelum'] = 'home';
        $saldo = $this->services_model->getSaldo('ALL');
        $data['transaksi'] = $this->services_model->getTransaksiHariIni();
        $data['total_saldo'] = 0;
        $data['title'] = 'Laporan Keuangan';
        if($saldo['statusCode'] == 200){
            $data['total_saldo'] = $saldo['data']['total_saldo'];
        }
		$this->loadView('home_view',$data);
    }

    public function dashboard()
	{
        $data['tanggal'] = $this->getDateFromString(date('m/d/Y'));
        $data['halaman_sebelum'] = 'home';
        $saldo = $this->services_model->getSaldo('ALL');
        $data['transaksi'] = $this->services_model->getTransaksiHariIni();
        foreach($this->services_model->getTransaksiRekap()['data'] as $data['rekap']);
        $data['total_saldo'] = 0;
        $data['title'] = 'Home';
        if($saldo['statusCode'] == 200){
            $data['total_saldo'] = $saldo['data']['total_saldo'];
        }
		$this->loadViewNavbar('user/laporan_keuangan.php',$data);

    }

    public function logout(){
        $this->session->unset_userdata('dataLogin',$cek['data']);
        redirect('login');
    }
}
