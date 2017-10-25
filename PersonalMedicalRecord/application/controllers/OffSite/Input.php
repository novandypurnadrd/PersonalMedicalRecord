
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {

	public function Input(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->model('OffSite_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "OffSite";
        $data['sub'] = "InputOffSite";
        $data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('OffSite/Input', $data);
    }else {
      redirect(base_url());
    }
	}

	public function InputOffSite()
	{
		if ($this->session->userdata('rolePMR')) {

			$data = array(
        'NIK' => $this->input->post('NIK'),
        'Date' => $this->input->post('Date'),
        'Diagnose' => $this->input->post('Diagnose'),
        'Therapy' => $this->input->post('Therapy'),
				'usrid' => $this->session->userdata('usernamePMR'),
			);

			$this->OffSite_model->addOffSite($data);

			redirect('OffSite/Table');
		}else {
			redirect(base_url());
		}
	}

}
?>
