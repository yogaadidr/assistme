<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('services_model');
        $dataLogin = $this->session->userdata('dataLogin');
        if($dataLogin == null){
            redirect('login');
        }
	}

	public function index($norek = null)
	{
        if($norek != null){
            $data['halaman_sebelum'] = 'home/rekening';
            $rekening = $this->services_model->getRekening($norek);
            foreach($rekening as $data['rekening']);
            // $data['transaksi'] = $this->services_model->getTransaksiRekening($norek);
            $data['title'] = 'Transaksi '.$data['rekening']['nama_rekening'] ;
            $this->loadViewNavbar('transaksi/daftar_transaksi_view',$data);
        }else{
            $data['halaman_sebelum'] = 'home';
            $data['rekening'] = $this->services_model->getSaldoRekening();
            $data['title'] = 'Daftar Rekening' ;
            $this->loadViewNavbar('rekening/rekening_view',$data);
        }
    }
}
