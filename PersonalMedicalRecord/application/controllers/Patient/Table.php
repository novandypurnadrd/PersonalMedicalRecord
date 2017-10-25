
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function Table(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Patient";
        $data['sub'] = "recordPatient";
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('Patient/Table', $data);
    }else {
      redirect(base_url());
    }
	}

	public function DeletePatient($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->Patient_model->deletePatient($id);
			redirect('Patient/Table');
		}
		else {
			redirect(base_url());
		}
	}

	public function Update($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('Patient/Update');
		}
		else {
			redirect(base_url());
		}
	}

}
?>
