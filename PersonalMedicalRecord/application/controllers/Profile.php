<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function Profile(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
      $this->User_model->GetUser($this->session->userdata('usernamePMR'), $this->session->userdata('passwordPMR'));
      $data['User'] = '';
      $data['main'] = "";
      $data['sub'] = "";
      $data['subsub'] = "";
			$this->load->view('Profile', $data);
		}
		else {
			redirect(base_url());
		}
	}

	public function UpdateProfile()
	{
		if ($this->session->userdata('rolePMR')) {
			if ($this->input->post('new') == '') {
				$data = array(
					'name' => $this->input->post('name'),
				);
				$this->User_model->updateProfile($data);
				$data_session = array(
					'username'=> $this->session->userdata('usernamePMR'),
					'password'=> $this->session->userdata('passwordPMR'),
					'role'=> $this->session->userdata('rolePMR'),
					'name'=> $this->input->post('name'),
				);
			}
			else {
				$data = array(
					'name' => $this->input->post('name'),
					'password' => $this->input->post('new'),
				);
				$this->User_model->updateProfile($data);
				$data_session = array(
					'username'=> $this->session->userdata('usernamePMR'),
					'password'=> $this->input->post('new'),
					'role'=> $this->session->userdata('rolePMR'),
					'name'=> $this->input->post('name'),
				);
			}

			$this->session->set_userdata($data_session);


			redirect('Profile');

		}
		else {
			redirect(base_url());
		}
	}

}
?>
