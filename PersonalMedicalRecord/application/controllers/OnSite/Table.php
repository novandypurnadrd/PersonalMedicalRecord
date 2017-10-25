
<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Controller {

	public function Table(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('OnSite_model');
    $this->load->model('Company_model');
		$this->load->model('Patient_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "OnSite";
        $data['sub'] = "recordOnSite";
        $data['OnSite'] = $this->OnSite_model->getOnSite();
				$data['Patient'] = $this->Patient_model->getPatient();
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('OnSite/Table', $data);
    }else {
      redirect(base_url());
    }
	}

	public function DeleteOnSite($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->OnSite_model->deleteOnSite($id);
			redirect('OnSite/Table');
		}
		else {
			redirect(base_url());
		}
	}

	public function Update($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('OnSite/Update');
		}
		else {
			redirect(base_url());
		}
	}

  public function Detail($id)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $id);
			redirect('OnSite/Detail');
		}
		else {
			redirect(base_url());
		}
	}

	public function DetailNIK($NIK)
	{
		if ($this->session->userdata('rolePMR')) {
			$this->session->set_flashdata('item', $NIK);
			redirect('OnSite/Detail/NIK');
		}
		else {
			redirect(base_url());
		}
	}

}
?>
