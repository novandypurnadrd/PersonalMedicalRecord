
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {

	public function Update(){
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
				$data['id'] = $this->session->flashdata('item');
				$data['main'] = "Reference";
        $data['sub'] = "";
				$data['Reference'] = $this->Reference_model->getReferenceByID($data['id']);
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('Reference/Update', $data);
    }else {
      redirect(base_url());
    }
	}

	public function UpdateReference($id)
	{
		if ($this->session->userdata('rolePMR')) {

			$data = array(
				'NIK' => $this->input->post('NIK'),
				'DateReference' => $this->input->post('DateReference'),
        'Date' => $this->input->post('Date'),
				'Diagnose' => $this->input->post('Diagnose'),
				'Note' => $this->input->post('Note'),
        'Purpose' => $this->input->post('Purpose'),
        'Status' => $this->input->post('Status'),
				'usrid' => $this->session->userdata('usernamePMR'),
			);

			$this->Reference_model->updateReference($data, $id);

			redirect('Reference/Table');
		}else {
			redirect(base_url());
		}
	}

}
?>
