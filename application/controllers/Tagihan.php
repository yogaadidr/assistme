<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends MY_Controller {

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
        $data['halaman_sebelum'] = 'home';
        $data['tagihan'] = $this->services_model->getTagihan();
        $data['title'] = 'Daftar Tagihan' ;
        $data['tanggal'] = $this->getDateFromString(date('Y-m-d ')) ;
        $this->loadViewNavbar('tagihan/tagihan_view',$data);
    }

    public function tambah()
	{
        $data['halaman_sebelum'] = 'home/tagihan';
        $data['kategori'] = $this->services_model->getKategori('keluar');
        $data['title'] = 'Tambah Tagihan' ;
        $this->loadViewNavbar('tagihan/tambah_tagihan_view',$data);
    }
    public function proses_tambah_tagihan()
	{
        $data['nama_tagihan'] = $this->input->post("nama_tagihan");
        $data['nominal_tagihan'] = $this->input->post("nominal_tagihan");
        $data['kategori'] = $this->input->post("kategori");
        $data['jenis_tagihan'] = $this->input->post("jenis_tagihan");

        $result = $this->services_model->addtagihan($data);
        if($result['statusCode'] != 200){
            $this->set_alert(false,$result['error']);
        }else{
            $this->set_alert(true,'tagihan berhasil ditambah');
        }
       
       redirect("tagihan");
    }

    public function bayar()
	{
        $id_tagihan = $_GET["id"];
        $data['halaman_sebelum'] = 'home';
        $data['rekening'] = $this->services_model->getRekening();
        $data['kategori'] = $this->services_model->getKategori('tagihan');
        $data['tagihan'] = $this->getTagihan($id_tagihan)['data'];
        $data['jenis'] = 'tagihan';
        $data['title'] = 'Bayar Tagihan' ;
        $this->loadViewNavbar('transaksi/transaksi_view',$data);
        /*
        $id_tagihan = $this->input->post("id_tagihan");
        if($result['statusCode'] != 200){
            $this->set_alert(false,$result['error']);
        }else{
            $this->set_alert(true,'tagihan berhasil dihapus');
        }*/
        //redirect("home/tagihan");
    }

    private function getTagihan($id_tagihan){
        return $this->services_model->getTagihanByID($id_tagihan);
    }

    public function hapus()
	{
        $id_tagihan = $this->input->post("id_tagihan");
        $result = $this->services_model->hapustagihan($id_tagihan);
        if($result['statusCode'] != 200){
            $this->set_alert(false,$result['error']);
        }else{
            $this->set_alert(true,'tagihan berhasil dihapus');
        }
        redirect("home/tagihan");
    }

}
