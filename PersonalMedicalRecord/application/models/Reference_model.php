<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Reference_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

    // MEAL BOX
		// function getReference(){
    //   $view = $this->db->get('reference');
	  //   return $view->result();
		// }

		function getReference(){
      $view = $this->db->query('SELECT * FROM `patient` p, reference r WHERE p.status = "1" AND r.NIK = p.NIK');
	    return $view->result();
		}

		function getReferenceByDetails($NIK, $DateReference){
			$view = $this->db->get_where('reference', array('NIK' => $NIK, 'DateReference' => $DateReference));
			return $view->result();
		}

		function getReferenceById($id){
			$view = $this->db->get_where('reference', array('id' => $id, ));
			return $view->result();
		}

		function getReferenceByNIK($NIK){
			$view = $this->db->get_where('reference', array('NIK' => $NIK, ));
			return $view->result();
		}

    function addReference($data){
      $this->db->insert('reference',$data);
    }

    function deleteReference($id){
			$this->db->delete('reference',array('id'=>$id));
		}

    function updateReference($data, $id){
			$this->db->where('id', $id);
			$this->db->update('reference',$data);
		}

		function getUploadReference(){
			$view = $this->db->query('SELECT * FROM `patient` p, uploadreference u WHERE p.status = "1" AND u.NIK = p.NIK');
	    return $view->result();
		}

		function getUploadReferenceByID($id){
			$view = $this->db->get_where('uploadreference', array('id' => $id, ));
			return $view->result();
		}

		function uploadReference($data)
		{
			$this->db->insert('uploadreference',$data);
		}

		function deleteUploadReference($id){
			$this->db->delete('uploadreference',array('id'=>$id));
		}

    function updateUploadReference($data, $id){
			$this->db->where('id', $id);
			$this->db->update('uploadreference',$data);
		}
	}

?>
