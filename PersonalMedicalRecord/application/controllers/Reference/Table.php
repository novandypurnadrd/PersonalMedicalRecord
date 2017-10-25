
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function Table(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Reference_model');
    $this->load->model('Company_model');
		$this->load->model('Patient_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Reference";
        $data['sub'] = "recordReference";
        $data['Reference'] = $this->Reference_model->getReference();
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('Reference/Table', $data);
    }else {
      redirect(base_url());
    }
	}

	public function DeleteReference($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->Reference_model->deleteReference($id);
			redirect('Reference/Table');
		}
		else {
			redirect(base_url());
		}
	}

	public function Update($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('Reference/Update');
		}
		else {
			redirect(base_url());
		}
	}

  public function Detail($NIK, $DateReference)
	{
		if ($this->session->userdata('rolePMR')) {
			$Data['NIK'] = $NIK;
			$Data['DateReference'] = $DateReference;
			$this->session->set_flashdata('item', $Data);

			redirect('Reference/Detail');
		}
		else {
			redirect(base_url());
		}
	}

}
?>
