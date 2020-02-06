<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
	}

	public function api_url()
	{
		return $this->config->item('api_url');
	}
    
    public function loadViewOnly($view,$data){
		$this->load->view($view,$data);
	}

	public function loadView($view,$data){
		$this->load->view('template/header',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}
	public function loadViewNavbar($view,$data){
		$this->load->view('template/header',$data);
		$this->load->view('template/navigation',$data);
		$this->load->view($view,$data);
		$this->load->view('template/footer');
	}

	public function set_alert($isSuccess, $message){
		$class = 'is-danger';
		$style = "style='padding:10px;font-size:14px;'";
		if($isSuccess){
			$class = 'is-success';
		}
		$alert = '<div class="notification '.$class.'" '.$style.'>'.$message.'</div><br/>';
		$this->session->set_flashdata("alert",$alert);
	}

	public function getDateFromString($string_date){
		if(strlen($string_date) == 7){
			$string_date = $string_date.'-01';
		}
        $year = date('Y',strtotime($string_date));
        $month = date('m',strtotime($string_date));
        $month_name = $this->getMonthName(date('m',strtotime($string_date)));
        $day = date('d',strtotime($string_date));
        $date = date('Y-m-d',strtotime($string_date));
        return array("year"=>$year,"month"=>$month,"month_name"=>$month_name,"day"=>$day,"date"=>$date);
	}

	public function getMonthName($month){
		if($month == 1 || $month == '01'){
			return 'Januari';
		}else if($month == 2 || $month == '02'){
			return 'Februari';
		}else if($month == 3 || $month == '03'){
			return 'Maret';
		}else if($month == 4 || $month == '04'){
			return 'April';
		}else if($month == 5 || $month == '05'){
			return 'Mei';
		}else if($month == 6 || $month == '06'){
			return 'Juni';
			
		}else if($month == 7 || $month == '07'){
			return 'Juli';
			
		}else if($month == 8 || $month == '08'){
			return 'Agustus';
	
		}else if($month == 9 || $month == '09'){
			return 'September';
			
		}else if($month == 10){
			return 'Oktober';
			
		}else if($month == 11){
			return 'November';
			
		}else if($month == 12){
			return 'Desember';
		}
	}
}
