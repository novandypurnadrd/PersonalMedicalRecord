
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends CI_Controller {

	public function Input(){
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
		$data['main'] = "OnSite";
        $data['sub'] = "InputOnSite";
        $data['Patient'] = $this->Patient_model->getPatient();
				$Counter = $this->OnSite_model->Counter();
				foreach ($Counter as $c) {
					$counter[] = $c->Number;
				}

				$temp = 0;
				for ($i=0; $i < sizeof($counter) ; $i++) {
					if (explode('/', $counter[$i])[0] >= $temp) {
						$temp = $counter[$i];
					}
				}

      	$date = date('m/y');
        $data['Number'] = sprintf('%04d',($temp + 1)).'/'.$date;
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('OnSite/Input', $data);
    }else {
      redirect(base_url());
    }
	}

	public function InputOnSite()
	{
		if ($this->session->userdata('rolePMR')) {

			$data = array(
        'NIK' => $this->input->post('NIK'),
        'Patient' => $this->input->post('Patient'),
        'Nationality' => $this->input->post('Nationality'),
        'Number' => $this->input->post('Number'),
        'Date' => $this->input->post('Date'),
        'Time' => $this->input->post('Time'),
        'Incident' => $this->input->post('Incident'),
        'Staff' => $this->input->post('Staff'),
				'Consultation' => $this->input->post('Consultation'),
        'CaseType' => $this->input->post('Case'),
        'Subjective' => $this->input->post('Subjective'),
        'Objective' => $this->input->post('Objective'),
        'Assessment' => $this->input->post('Assessment'),
				'Plan' => $this->input->post('Plan'),
        'Education' => $this->input->post('Education'),
        'Treatment' => $this->input->post('Treatment'),
        'Medications' => $this->input->post('Medications'),
        'Fitness' => $this->input->post('Fitness'),
				'usrid' => $this->session->userdata('usernamePMR'),
			);

			$this->OnSite_model->addOnSite($data);

			redirect('OnSite/Table');
		}else {
			redirect(base_url());
		}
	}

}
?>
