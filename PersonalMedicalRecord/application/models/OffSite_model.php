<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class OffSite_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

    // MEAL BOX
		// function getOffSite(){
    //   $view = $this->db->get('offsite');
	  //   return $view->result();
		// }

		function getOffSite(){
      $view = $this->db->query('SELECT * FROM `patient` p, offsite off WHERE p.status = "1" AND off.NIK = p.NIK');
	    return $view->result();
		}

		function getOffSiteByID($id){
			$view = $this->db->get_where('offsite', array('id' => $id, ));
			return $view->result();
		}

		function getOffSiteByNIK($NIK){
			$view = $this->db->get_where('offsite', array('NIK' => $NIK, ));
			return $view->result();
		}

    function addOffSite($data){
      $this->db->insert('offsite',$data);
    }

    function deleteOffSite($id){
			$this->db->delete('offsite',array('id'=>$id));
		}

    function updateOffSite($data, $id){
			$this->db->where('id', $id);
			$this->db->update('offsite',$data);
		}

	}

?>
