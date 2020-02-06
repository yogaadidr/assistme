<?php
class Services_model extends CI_Model {

	//Model nggo njupuk data seko api server

    private $api_url;

	public function __construct(){
    	$this->api_url = $this->config->item('api_url');
    }

    public function loginUser($data){
        return $this->getAPI("POST","/login",$data);
    }

    public function getSaldo($rekening){
        $data['no_rekening'] = $rekening;
        return $this->getAPI("POST","/saldo",$data);
    }
    public function getTransaksiHariIni(){
        $data['jenis'] = 'harian';
        date_default_timezone_set("Asia/Bangkok");
        $data['tanggal_awal'] = date('Y-m-d');
        $data['tanggal_akhir'] = date('Y-m-d');
        return $this->getAPI("POST","/transaksi/list",$data);
    }

    public function getTransaksiRekening($input){
        $data['jenis'] = 'harian';
        $data['tanggal_awal'] = $input['tanggal'];
        $data['tanggal_akhir'] = $input['tanggal'];
        $data['rekening'] = $input['rekening'];
        date_default_timezone_set("Asia/Bangkok");
        return $this->getAPI("POST","/transaksi/list",$data);
    }

    public function getRekening($rekening = null){
        if($rekening != null){
            return $this->getAPI("GET","/rekening/".$rekening);
        }else{
            return $this->getAPI("GET","/rekening");
        }
    }
    public function getSaldoRekening(){
        $data['no_rekening'] = 'rekening';
        return $this->getAPI("POST","/rekening/saldo",$data);
    }

    public function getKategori($jenis){
        if($jenis == 'keluar'){
            return $this->getAPI("GET","/kategori/cash_out");
        }else if($jenis == 'masuk'){
            return $this->getAPI("GET","/kategori/cash_in");
        }else if($jenis == 'transfer'){
            return $this->getAPI("GET","/kategori");
        }
        
    }

    public function addTransaksi($data){
        return $this->getAPI("POST","/transaksi/tambah",$data);
    }
    
    public function getAnggaran(){
        return $this->getAPI("GET","/anggaran/list",'');
    }
    public function hapusAnggaran($idAnggaran){
        return $this->getAPI("DELETE","/anggaran/".$idAnggaran."/delete",'');
    }
    public function addAnggaran($data){
        var_dump($data);
        return $this->getAPI("POST","/anggaran/tambah",$data);
    }
    
    
    public function getAPI($method,$url,$body = null){

        $url = $this->api_url.$url;
        $request_headers = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        
        $data = curl_exec($ch);
        
        if (curl_errno($ch))
        {
            print "Error: " . curl_error($ch);
        }
        else
        {
            $transaction = json_decode($data, TRUE);
            curl_close($ch);
            return $transaction;
        }
    }
}