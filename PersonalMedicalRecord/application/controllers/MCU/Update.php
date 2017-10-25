
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {

	public function Update(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->model('MCU_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['id'] = $this->session->flashdata('item');
				$data['main'] = "MCU";
        $data['sub'] = "";
				$data['MCU'] = $this->MCU_model->getMCUByID($data['id']);
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();

		    $this->load->view('MCU/Update', $data);
    }else {
      redirect(base_url());
    }
	}

	public function UpdateMCU($id)
	{
		if ($this->session->userdata('rolePMR')) {

      $NIK = $this->input->post('NIK');
      $Type = $this->input->post('Type');
      $DateMCU = $this->input->post('DateMCU');
      $DateResult = $this->input->post('DateResult');
      $BP = $this->input->post('BP');
      $Pulse = $this->input->post('Pulse');
      $Resp = $this->input->post('Resp');
      $Height = $this->input->post('Height');
      $Weight = $this->input->post('Weight');
      $BMI = $this->input->post('BMI');
      $VOD = $this->input->post('VOD');
      $VOS = $this->input->post('VOS');
      $VODS = $this->input->post('VODS');
      $ColorBlind = $this->input->post('ColorBlind');
      $Eyes = $this->input->post('Eyes');
      $ENT = $this->input->post('ENT');
      $Heart = $this->input->post('Heart');
      $Lung = $this->input->post('Lung');
      $Abd = $this->input->post('Abd');
      $Hand = $this->input->post('Hand');
      $Leg = $this->input->post('Leg');
      $Paresis = $this->input->post('Paresis');
      $Edema = $this->input->post('Edema');
      $Skin = $this->input->post('Skin');
      $Genital = $this->input->post('Genital');
      $Varices = $this->input->post('Varices');
      $Audiometry = $this->input->post('Audiometry');
      $Spirometry = $this->input->post('Spirometry');
      $ECG = $this->input->post('ECG');
      $XRay = $this->input->post('XRay');
      $Hematology = $this->input->post('Hematology');
      $Urinalisis = $this->input->post('Urinalisis');
      $Biokimia = $this->input->post('Biokimia');
      $Serology = $this->input->post('Serology');
      $LogamBerat = $this->input->post('LogamBerat');
      $Summary = $this->input->post('Summary');
      $Fit = $this->input->post('Fit');
			if ($Fit == "1") {
				$AfterTX = "0";
			}
			else {
				$AfterTX = "1";
			}
      $Recommendation = $this->input->post('Recommendation');
      $NoteDoctor = $this->input->post('NoteDoctor');
      $NoteHR = $this->input->post('NoteHR');

			$data = array(
        'NIK' => $NIK,
        'Type' => $Type,
        'DateMCU' => $DateMCU,
        'DateResult' => $DateResult,
        'BP' => $BP,
        'Pulse' => $Pulse,
        'Resp' => $Resp,
        'Height' => $Height,
        'Weight' => $Weight,
        'BMI' => $BMI,
        'VOD' => $VOD,
        'VOS' => $VOS,
        'VODS' => $VODS,
        'ColorBlind' => $ColorBlind,
        'Eyes' => $Eyes,
        'ENT' => $ENT,
        'Heart' => $Heart,
        'Lung' => $Lung,
        'Abd' => $Abd,
        'Hand' => $Hand,
        'Leg' => $Leg,
        'Paresis' => $Paresis,
        'Edema' => $Edema,
        'Skin' => $Skin,
        'Genital' => $Genital,
        'Varices' => $Varices,
        'Audiometry' => $Audiometry,
        'Spirometry' => $Spirometry,
        'ECG' => $ECG,
        'XRay' => $XRay,
        'Hematology' => $Hematology,
        'Urinalisis' => $Urinalisis,
        'Biokimia' => $Biokimia,
        'Serology' => $Serology,
        'LogamBerat' => $LogamBerat,
        'Summary' => $Summary,
        'Fit' => $Fit,
        'AfterTX' => $AfterTX,
        'Recommendation' => $Recommendation,
        'NoteDoctor' => $NoteDoctor,
        'NoteHR' => $NoteHR,
				'usrid' => $this->session->userdata('usernamePMR'),
			);

			$this->MCU_model->updateMCU($data, $id);

			redirect('MCU/Table');
		}else {
			redirect(base_url());
		}
	}

}
?>
