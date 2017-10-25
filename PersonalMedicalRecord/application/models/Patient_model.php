<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Patient_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

    // MEAL BOX
		function getPatient(){
      // $view = $this->db->query('SELECT p.id, p.Sex, p.NIK, p.Name, p.DateBirth, p.Site, p.Company,  p.Age, d.Departement, s.Section, p.Telp, p.Emergency FROM patient p, dept d, section s WHERE p.Departement = d.id AND p.Job = s.id');
			$view = $this->db->get('patient');
			return $view->result();
		}

		function getActivePatient(){
      $view = $this->db->get_where('patient', array('Status' => '1', ));
			return $view->result();
		}

		function getPatientByID($id){
			$view = $this->db->get_where('patient', array('id' => $id, ));
			return $view->result();
		}

		function getPatientByNIK($NIK){
			$view = $this->db->get_where('patient', array('NIK' => $NIK, ));
			return $view->result();
		}

    function addPatient($data){
      $this->db->insert('patient',$data);
    }

    function deletePatient($id){
			$this->db->delete('patient',array('id'=>$id));
		}

    function updatePatient($data, $id){
			$this->db->where('id', $id);
			$this->db->update('patient',$data);
		}

	}

?>
