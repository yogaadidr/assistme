<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('services_model');
        $dataLogin = $this->session->userdata('dataLogin');
        if($dataLogin == null){
            redirect('login');
        }
	}

	public function index($jenis,$rekening = null)
	{
        if($jenis == 'tambah'){
            $data['tanggal_transaksi'] = $this->input->post("tanggal_transaksi");
            $data['nominal'] = $this->input->post("nominal");
            $data['rekening_asal'] = $this->input->post("rekening_asal");
            $data['rekening_tujuan'] = $this->input->post("rekening_tujuan");
            $data['kategori'] = $this->input->post("kategori");
            $data['keterangan'] = $this->input->post("keterangan");
            $id_tagihan = $this->input->post("id_tagihan");
            $jenis = $this->input->post("jenis");

            if($data['rekening_asal'] == ''){
                $data['rekening_asal'] = '99';
            }
            if($data['rekening_tujuan'] == ''){
                $data['rekening_tujuan'] = '99';
            }

            $result = $this->services_model->addTransaksi($data);
            if($result['statusCode'] != 200){
                $this->set_alert(false,$result['error']);
            }else{
                if($jenis == 'tagihan'){
                    $req['id_tagihan'] = $id_tagihan;
                    $req['id_transaksi'] = $result['data'];
                    $hasil = $this->services_model->addDetailTagihan($req);
                    var_dump($hasil);
                }
                $this->set_alert(true,'Transaksi berhasil ditambah');
            }
            redirect('home');


        }else{
            $data['halaman_sebelum'] = 'home';
            $data['rekening'] = $this->services_model->getRekening();
            $data['kategori'] = $this->services_model->getKategori($jenis);
            $data['jenis'] = $jenis;
            $data['title'] = 'Transaksi '.$jenis ;
            $this->loadViewNavbar('transaksi/transaksi_view',$data);
        }
    }
    public function getTransaksiRekening(){
        $input['tanggal'] = date('Y-m-d',strtotime($this->input->post("tanggal"))); 
        $input['rekening'] = $this->input->post("rekening"); 
        $data['transaksi'] = $this->services_model->getTransaksiRekening($input);
        $this->loadViewOnly('widget/transaksi_list',$data);
    }
}
