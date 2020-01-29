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

    public function transaksi($jenis)
	{
        if($jenis == 'tambah'){

            $data['tanggal_transaksi'] = $this->input->post("tanggal_transaksi");
            $data['nominal'] = $this->input->post("nominal");
            $data['rekening_asal'] = $this->input->post("rekening_asal");
            $data['rekening_tujuan'] = $this->input->post("rekening_tujuan");
            $data['kategori'] = $this->input->post("kategori");
            $data['keterangan'] = $this->input->post("keterangan");

            if($data['rekening_asal'] == ''){
                $data['rekening_asal'] = '99';
            }
            if($data['rekening_tujuan'] == ''){
                $data['rekening_tujuan'] = '99';
            }

            $result = $this->services_model->addTransaksi($data);
            var_dump($result);
            if($result['statusCode'] != 200){
                $this->session->set_flashdata("alert",$result['error']);
            }else{
                $this->session->set_flashdata("alert",'Transaksi berhasil ditambah');
            }
            redirect('home');


        }else{
            $data['rekening'] = $this->services_model->getRekening();
            $data['kategori'] = $this->services_model->getKategori($jenis);
            $data['jenis'] = $jenis;
            $data['title'] = 'Transaksi '.$jenis ;
            $this->loadViewNavbar('transaksi_view',$data);
        }
        
    }

    public function logout(){
        $this->session->unset_userdata('dataLogin',$cek['data']);
        redirect('login');
    }

}
