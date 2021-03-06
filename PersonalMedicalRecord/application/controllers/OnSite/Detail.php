
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function Detail(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->model('OnSite_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['id'] = $this->session->flashdata('item');
				$data['main'] = "OnSite";
        $data['sub'] = "";
				$data['OnSite'] = $this->OnSite_model->getOnSiteByID($data['id']);
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('OnSite/Detail', $data);
    }else {
      redirect(base_url());
    }
	}

	public function NIK(){
    if ($this->session->userdata('rolePMR')) {
				$data['NIK'] = $this->session->flashdata('item');
				$data['main'] = "OnSite";
        $data['sub'] = "";
				$data['OnSite'] = $this->OnSite_model->getOnSiteByNIK($data['NIK']);
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('OnSite/Detail', $data);
    }else {
      redirect(base_url());
    }
	}
}
?>
