<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function Login(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->library('session');
	}

	public function Index(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$check = $this->User_model->GetUser($username, $password);

		if ($check) {
			foreach ($check as $key => $data) {
					$data_session = array(
              'id' => $data->id,
							'usernamePMR'=>$data->username,
							'passwordPMR'=>$data->password,
							'rolePMR'=>$data->role,
							'namePMR'=>$data->name,
							'PMR'=>'PMR',
						);
			}

			$this->session->set_userdata($data_session);
			redirect('Dashboard');

		}else {
			$data['message'] = 'Wrong username and password';
			$this->load->view('Index', $data);
		}
	}

}
?>
