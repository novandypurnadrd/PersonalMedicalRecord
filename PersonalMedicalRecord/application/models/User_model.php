<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class User_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function GetUser($username, $password){
      $d = $this->db->get_where('user',array('username'=>$username, 'password'=>$password));
	    return $d->result();
		}

		function updateProfile($data){
			$this->db->where('username', $this->session->userdata('usernamePMR'));
			$this->db->update('user',$data);
		}

	}

?>
