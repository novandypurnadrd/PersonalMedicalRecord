<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class OnSite_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

    // MEAL BOX
		// function getOnSite(){
    //   $view = $this->db->get('onsite');
	  //   return $view->result();
		// }

		function getOnSite(){
      $view = $this->db->query('SELECT * FROM `patient` p, onsite o WHERE p.status = "1" AND o.NIK = p.NIK AND YEAR(`Date`) = YEAR(CURDATE()) ');
	    return $view->result();
		}

		public function Counter()
		{
			$view = $this->db->query('SELECT `Number` from onsite WHERE YEAR(`Date`) = YEAR(CURDATE()) ');
			return $view->result();
		}

		public function Graph()
		{
			$view = $this->db->query('SELECT count(id) as visitor, Date from onsite group by Date ');
			return $view->result();
		}

		public function Daily()
		{
			$view = $this->db->query('SELECT count(id) as visitor from onsite WHERE DATE(`Date`) = CURDATE() ');
			return $view->result();
		}

		public function Monthly()
		{
			$view = $this->db->query('SELECT count(id) as visitor from onsite WHERE MONTH(`Date`) = MONTH(CURDATE()) ');
			return $view->result();
		}

		public function Yearly()
		{
			$view = $this->db->query('SELECT count(id) as visitor from onsite WHERE YEAR(`Date`) = YEAR(CURDATE()) ');
			return $view->result();
		}

		function getOnSiteByID($id){
			$view = $this->db->get_where('onsite', array('id' => $id, ));
			return $view->result();
		}

		function getOnSiteByNIK($NIK){
			$view = $this->db->get_where('onsite', array('NIK' => $NIK, ));
			return $view->result();
		}

    function addOnSite($data){
      $this->db->insert('onsite',$data);
    }

    function deleteOnSite($id){
			$this->db->delete('onsite',array('id'=>$id));
		}

    function updateOnSite($data, $id){
			$this->db->where('id', $id);
			$this->db->update('onsite',$data);
		}

	}

?>
