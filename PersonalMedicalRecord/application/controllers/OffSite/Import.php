
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	public function Import(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('OffSite_model');
		$this->load->library('session');
		$this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "OffSite";
        $data['sub'] = "importOffSite";
				$data['hidden'] = "yes";
		    $this->load->view('OffSite/Import', $data);
    }else {
      redirect(base_url());
    }
	}

	public function ImportOffSite(){
		if ($this->session->userdata('rolePMR')) {

				$fileName = time().$_FILES['file']['name'];

        $config['upload_path'] = './excel/'; //buat folder dengan nama assets di root folder
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv';
        $config['max_size'] = 10000;

        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('file') ){
					$data['hidden'] = "no";
					$data['main'] = "OffSite";
	        $data['sub'] = "importOffSite";
					$this->load->view('Daily/OffSite/Import', $data);
				}else {
					$media = $this->upload->data('file');
	        $inputFileName = './excel/'.$fileName;

	        try {
	                $inputFileType = IOFactory::identify($inputFileName);
	                $objReader = IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	            } catch(Exception $e) {
	                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
	            }

	            $sheet = $objPHPExcel->getSheet(0);
	            $highestRow = $sheet->getHighestRow();
	            $highestColumn = $sheet->getHighestColumn();

	            for ($row = 4; $row <= $highestRow; $row++){                  //  Read a row of data into an array
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                                NULL,
	                                                TRUE,
	                                                FALSE);

									$temp = (int)$rowData[0][4];
								  $DateOffSite = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$DateOffSite = $DateOffSite->format("Y-m-d");

	                // Sesuaikan sama nama kolom tabel di database
	                 $data = array(
                     'NIK' => $rowData[0][0],
                     'Date' => $DateOffSite,
                     'Diagnose' => $rowData[0][5],
                     'Therapy' => $rowData[0][6],
 					           'usrid' => $this->session->userdata('usernamePMR'),
	                );

	                //sesuaikan nama dengan nama tabel
	                $this->OffSite_model->addOffSite($data);

	            }

							$this->load->helper('file');
							unlink($inputFileName);
							redirect('OffSite/Table');
				}
		}
		else {
			redirect(base_url());
		}
	}

}
?>
