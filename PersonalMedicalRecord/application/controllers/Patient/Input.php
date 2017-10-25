
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {

	public function Input(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Company_model');
		$this->load->model('Patient_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Patient";
        $data['sub'] = "InputPatient";
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('Patient/Input', $data);
    }else {
      redirect(base_url());
    }
	}

	public function InputPatient()
	{
		if ($this->session->userdata('rolePMR')) {

			$data = array(
        'NIK' => $this->input->post('NIK'),
				'Name' => $this->input->post('Name'),
        'DateBirth' => $this->input->post('DateBirth'),
        'Age' => $this->input->post('Age'),
        'Sex' => $this->input->post('Sex'),
        'Job' => $this->input->post('Job'),
				'Section' => $this->input->post('Section'),
        'Departement' => $this->input->post('Departement'),
        'Site' => $this->input->post('Site'),
        'Company' => $this->input->post('Company'),
        'Telp' => $this->input->post('Telp'),
				'Emergency' => $this->input->post('Emergency'),
				'Relation' => $this->input->post('Relation'),
				'Status' => $this->input->post('Status'),
        'Allergy' => $this->input->post('Allergy'),
				'usrid' => $this->session->userdata('usernamePMR'),
			);

			$this->Patient_model->addPatient($data);

			redirect('/Patient/Table');
		}else {
			redirect(base_url());
		}
	}

}
?>
