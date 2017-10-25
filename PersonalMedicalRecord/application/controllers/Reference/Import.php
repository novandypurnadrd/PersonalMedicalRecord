
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	public function Import(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Reference_model');
		$this->load->library('session');
		$this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Reference";
        $data['sub'] = "importReference";
				$data['hidden'] = "yes";
		    $this->load->view('Reference/Import', $data);
    }else {
      redirect(base_url());
    }
	}

	public function ImportReference(){
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
					$data['main'] = "Reference";
	        $data['sub'] = "importReference";
					$this->load->view('Daily/Reference/Import', $data);
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

	            for ($row = 3; $row <= $highestRow; $row++){                  //  Read a row of data into an array
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                                NULL,
	                                                TRUE,
	                                                FALSE);

									$temp = (int)$rowData[0][1];
								  $DateReference = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$DateReference = $DateReference->format("Y-m-d");

									$temp = (int)$rowData[0][2];
								  $Date = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$Date = $Date->format("Y-m-d");

									if (strcasecmp("fit", $rowData[0][6]) == 0) {
										$Status = "1";
									}
									else {
										$Status = "0";
									}

	                // Sesuaikan sama nama kolom tabel di database
	                 $data = array(
                     'NIK' => $rowData[0][0],
										 'DateReference' => $DateReference,
                     'Date' => $Date,
										 'Purpose' => $rowData[0][3],
										 'Diagnose' => $rowData[0][4],
                     'Note' => $rowData[0][5],
										 'Status' => $Status,
 					           'usrid' => $this->session->userdata('usernamePMR'),
	                );

	                //sesuaikan nama dengan nama tabel
	                $this->Reference_model->addReference($data);

	            }

							$this->load->helper('file');
							unlink($inputFileName);
							redirect('Reference/Table');
				}
		}
		else {
			redirect(base_url());
		}
	}

}
?>
