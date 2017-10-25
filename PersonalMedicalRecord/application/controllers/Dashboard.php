<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function Dashboard(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('OnSite_model');
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
      redirect(base_url());
    }
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
?>
