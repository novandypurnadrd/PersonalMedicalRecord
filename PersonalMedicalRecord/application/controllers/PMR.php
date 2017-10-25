<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PMR extends CI_Controller {

	public function PMR(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function Index(){
		if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Dashboard";
				$data['Graph'] = $this->OnSite_model->Graph();
				$data['Daily'] = $this->OnSite_model->Daily();
				$data['Monthly'] = $this->OnSite_model->Monthly();
				$data['Yearly'] = $this->OnSite_model->Yearly();
				$data['sub'] = "";
		    $this->load->view('Dashboard', $data);
    }else {
			$data['message'] = '';
			$this->load->view('Index', $data);
    }
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		$data['message'] = '';
		$this->load->view('Index', $data);
	}
}
?>
