
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function Table(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('OffSite_model');
    $this->load->model('Company_model');
		$this->load->model('Patient_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "OffSite";
        $data['sub'] = "recordOffSite";
        $data['OffSite'] = $this->OffSite_model->getOffSite();
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('OffSite/Table', $data);
    }else {
      redirect(base_url());
    }
	}

	public function DeleteOffSite($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->OffSite_model->deleteOffSite($id);
			redirect('OffSite/Table');
		}
		else {
			redirect(base_url());
		}
	}

	public function Update($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('OffSite/Update');
		}
		else {
			redirect(base_url());
		}
	}

  public function Detail($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('OffSite/Detail');
		}
		else {
			redirect(base_url());
		}
	}

	public function DetailNIK($NIK)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $NIK);
			redirect('OffSite/Detail/NIK');
		}
		else {
			redirect(base_url());
		}
	}

}
?>
