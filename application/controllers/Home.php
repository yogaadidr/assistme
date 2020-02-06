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

    public function transaksi($jenis,$rekening = null)
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
            if($result['statusCode'] != 200){
                $this->set_alert(false,$result['error']);
            }else{
                $this->set_alert(true,'Transaksi berhasil ditambah');
            }
            redirect('home');


        }else{
            $data['halaman_sebelum'] = 'home';

            $data['rekening'] = $this->services_model->getRekening();
            $data['kategori'] = $this->services_model->getKategori($jenis);
            $data['jenis'] = $jenis;
            $data['title'] = 'Transaksi '.$jenis ;
            $this->loadViewNavbar('transaksi_view',$data);
        }
    }

    public function getTransaksiRekening(){
        $input['tanggal'] = date('Y-m-d',strtotime($this->input->post("tanggal"))); 
        $input['rekening'] = $this->input->post("rekening"); 
        $data['transaksi'] = $this->services_model->getTransaksiRekening($input);
        $this->loadViewOnly('widget/transaksi_list',$data);
    }

    public function rekening($norek = null)
	{
        if($norek != null){
            $data['halaman_sebelum'] = 'home/rekening';
            $rekening = $this->services_model->getRekening($norek);
            foreach($rekening as $data['rekening']);
            // $data['transaksi'] = $this->services_model->getTransaksiRekening($norek);
            $data['title'] = 'Transaksi '.$data['rekening']['nama_rekening'] ;
            $this->loadViewNavbar('daftar_transaksi_view',$data);
        }else{
            $data['halaman_sebelum'] = 'home';
            $data['rekening'] = $this->services_model->getSaldoRekening();
            $data['title'] = 'Daftar Rekening' ;
            $this->loadViewNavbar('rekening_view',$data);
        }
    }

    public function anggaran()
	{
        $data['halaman_sebelum'] = 'home';
        $data['anggaran'] = $this->services_model->getAnggaran();
        $data['title'] = 'Daftar Anggaran' ;
        $data['tanggal'] = $this->getDateFromString(date('Y-m-d ')) ;
        $this->loadViewNavbar('anggaran_view',$data);
    }

    public function tambah_anggaran()
	{
        $data['halaman_sebelum'] = 'home/anggaran';
        $data['kategori'] = $this->services_model->getKategori('keluar');
        $data['halaman_sebelum'] = 'home';
        $data['title'] = 'Tambah Anggaran' ;
        $this->loadViewNavbar('tambah_anggaran_view',$data);
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
       
       redirect("home/anggaran");
    }

    public function hapus_anggaran()
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

    public function logout(){
        $this->session->unset_userdata('dataLogin',$cek['data']);
        redirect('login');
    }

}
