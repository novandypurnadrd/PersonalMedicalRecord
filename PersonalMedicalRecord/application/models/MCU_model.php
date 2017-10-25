<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class MCU_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

    // MEAL BOX
		// function getMCU(){
    //   $view = $this->db->get('mcu');
	  //   return $view->result();
		// }

		function getMCU(){
      $view = $this->db->query('SELECT * FROM `patient` p, mcu m WHERE p.status = "1" AND m.NIK = p.NIK');
	    return $view->result();
		}

		function getMCUByID($id){
			$view = $this->db->get_where('mcu', array('id' => $id, ));
			return $view->result();
		}

		function getMCUByNIK($NIK){
			$view = $this->db->get_where('mcu', array('NIK' => $NIK, ));
			return $view->result();
		}

    function addMCU($data){
      $this->db->insert('mcu',$data);
    }

    function deleteMCU($id){
			$this->db->delete('mcu',array('id'=>$id));
		}

    function updateMCU($data, $id){
			$this->db->where('id', $id);
			$this->db->update('mcu',$data);
		}

	}

?>
