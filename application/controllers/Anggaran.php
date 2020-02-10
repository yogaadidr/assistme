<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggaran extends MY_Controller {

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
        $data['anggaran'] = $this->services_model->getAnggaran();
        $data['title'] = 'Daftar Anggaran' ;
        $data['tanggal'] = $this->getDateFromString(date('Y-m-d ')) ;
        $this->loadViewNavbar('anggaran/anggaran_view',$data);
    }

    public function tambah()
	{
        $data['halaman_sebelum'] = 'home/anggaran';
        $data['kategori'] = $this->services_model->getKategori('keluar');
        $data['halaman_sebelum'] = 'home';
        $data['title'] = 'Tambah Anggaran' ;
        $this->loadViewNavbar('anggaran/tambah_anggaran_view',$data);
    }
    public function proses_tambah_anggaran()
	{
        $data['nama_anggaran'] = $this->input->post("nama_anggaran");
        $data['nominal_anggaran'] = $this->input->post("nominal_anggaran");
        $data['tipe'] = $this->input->post("tipe");
        $data['valid'] = $this->input->post("valid");
        $data['kategori'] = $this->input->post("kategori");
        $data['valid'] = 1;

        $result = $this->services_model->addAnggaran($data);
        if($result['statusCode'] != 200){
            $this->set_alert(false,$result['error']);
        }else{
            $this->set_alert(true,'Anggaran berhasil ditambah');
        }
       
       redirect("anggaran");
    }

    public function hapus()
	{
        $id_anggaran = $this->input->post("id_anggaran");
        $result = $this->services_model->hapusAnggaran($id_anggaran);
        if($result['statusCode'] != 200){
            $this->set_alert(false,$result['error']);
        }else{
            $this->set_alert(true,'Anggaran berhasil dihapus');
        }
        redirect("home/anggaran");
    }

}
