<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Company_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}


		function getDepartement(){
      $view = $this->db->get('dept');
	    return $view->result();
		}

    function getSection(){
      $view = $this->db->get('section');
	    return $view->result();
		}

	}

?>
