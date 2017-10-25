<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function Upload(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
    $this->load->model('Reference_model');
		$this->load->model('Patient_model');
		$this->load->library('session');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Reference";
				$data['sub'] = "uploadReference";
				$data['hidden'] = "yes";
				$data['Update'] = "0";
        $data['Reference'] = $this->Reference_model->getUploadReference();
				$data['Patient'] = $this->Patient_model->getActivePatient();
		    $this->load->view('Reference/Upload', $data);
    }else {
      redirect(base_url());
    }
	}

	public function UploadReference(){
		if ($this->session->userdata('rolePMR')) {

			$fileName = time().$_FILES['file']['name'];

			$config['upload_path'] = './excel/reference/'; //buat folder dengan nama assets di root folder
			$config['file_name'] = $fileName;
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 100000;
      $config['remove_space'] = FALSE;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if(! $this->upload->do_upload('file') ){
				redirect('Reference/Upload');
			}else {
				$media = $this->upload->data('file');
        $fileName = str_replace(" ","_",$fileName);
				$inputFileName = './excel/reference/'.$fileName.$media['file_ext'];

						// Sesuaikan sama nama kolom tabel di database
						 $data = array(
							'Date' => $this->input->post('Date'),
							'NIK' => $this->input->post('NIK'),
							'File' => $inputFileName,
							'usrid' => $this->session->userdata('usernamePMR'),
						);

								//sesuaikan nama dengan nama tabel
						$this->Reference_model->uploadReference($data);

						redirect('Reference/Upload');
			}
		}else {
			redirect(base_url());
		}
	}

	public function DeleteReference($id){
    if ($this->session->userdata('rolePMR')) {
			$Reference = $this->Reference_model->getUploadReferenceByID($id);

			$this->load->helper('file');
			foreach ($Reference as $certificates) {
				unlink($certificates->File);
			}

			$this->Reference_model->deleteUploadReference($id);
	    redirect('Reference/Upload');
    }else {
      redirect(base_url());
    }
	}

	public function Update($id){
    if ($this->session->userdata('rolePMR')) {
      $this->session->set_flashdata('item', $id);
			redirect('Reference/Upload/PageUpdate');
    }else {
      redirect(base_url());
    }
	}

  public function PageUpdate(){
    if ($this->session->userdata('rolePMR')) {
			$data['main'] = "Reference";
			$data['sub'] = "uploadReference";
      $data['id'] = $this->session->flashdata('item');
      $data['Update'] = "1";
			$data['id'] = "1";
      $data['Reference'] = $this->Reference_model->getUploadReferenceByID($data['id']);
      $data['Patient'] = $this->Patient_model->getActivePatient();
			$data['Table'] = $this->Reference_model->getUploadReference();
			$this->load->view('Reference/Upload', $data);
    }else {
      redirect(base_url());
    }
	}

	public function UpdateReference($id){
    if ($this->session->userdata('rolePMR')) {

			$data = array(
        'date' => $this->input->post('Date'),
        'NIK' => $this->input->post('NIK'),
        'usrid' => $this->session->userdata('usernamePMR'),
		 );

		 $this->Reference_model->updateUploadReference($data, $id);

		 redirect('Reference/Upload');

    }else {
      redirect(base_url());
    }
	}
}
?>
