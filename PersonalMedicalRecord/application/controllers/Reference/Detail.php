
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function Detail(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->model('Reference_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data = $this->session->flashdata('item');
				$data['main'] = "Reference";
        $data['sub'] = "";
				$data['Reference'] = $this->Reference_model->getReferenceByDetails($data['NIK'], $data['DateReference']);
				$data['Patient'] = $this->Patient_model->getPatientByNIK($data['NIK']);
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('Reference/Detail', $data);
    }else {
      redirect(base_url());
    }
	}
}
?>
