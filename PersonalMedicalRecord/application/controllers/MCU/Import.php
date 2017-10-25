
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	public function Import(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('MCU_model');
		$this->load->library('session');
		$this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "MCU";
        $data['sub'] = "importMCU";
				$data['hidden'] = "yes";
		    $this->load->view('MCU/Import', $data);
    }else {
      redirect(base_url());
    }
	}

	public function ImportMCU(){
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
					$data['main'] = "MCU";
	        $data['sub'] = "importMCU";
					$this->load->view('Daily/MCU/Import', $data);
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

									$temp = (int)$rowData[0][7];
								  $DateMCU = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$DateMCU = $DateMCU->format("Y-m-d");

									$temp = (int)$rowData[0][9];
								  $DateResult = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$DateResult = $DateResult->format("Y-m-d");

									if (strcasecmp("X", $rowData[0][44]) == 0) {
										$Fit = "1";
										$AfterTX = "0";
									}
									else {
										$Fit = "0";
										$AfterTX = "1";
									}

	                // Sesuaikan sama nama kolom tabel di database
	                 $data = array(
                     'NIK' => $rowData[0][0],
                     'Type' => $rowData[0][10],
                     'DateMCU' => $DateMCU,
                     'DateResult' => $DateResult,
                     'BP' => $rowData[0][11],
                     'Pulse' => $rowData[0][12],
                     'Resp' => $rowData[0][13],
                     'Height' => $rowData[0][14],
                     'Weight' => $rowData[0][15],
                     'BMI' => $rowData[0][16],
                     'VOD' => $rowData[0][17],
                     'VOS' => $rowData[0][18],
                     'VODS' => $rowData[0][19],
                     'ColorBlind' => $rowData[0][20],
                     'Eyes' => $rowData[0][21],
                     'ENT' => $rowData[0][22],
                     'Heart' => $rowData[0][23],
                     'Lung' => $rowData[0][24],
                     'Abd' => $rowData[0][25],
                     'Hand' => $rowData[0][26],
                     'Leg' => $rowData[0][27],
                     'Paresis' => $rowData[0][28],
                     'Edema' => $rowData[0][29],
                     'Skin' => $rowData[0][30],
                     'Genital' => $rowData[0][31],
                     'Varices' => $rowData[0][32],
                     'Audiometry' => $rowData[0][33],
                     'Spirometry' => $rowData[0][34],
                     'ECG' => $rowData[0][35],
                     'XRay' => $rowData[0][36],
                     'Hematology' => $rowData[0][37],
                     'Urinalisis' => $rowData[0][38],
                     'Biokimia' => $rowData[0][39],
                     'Serology' => $rowData[0][40],
                     'LogamBerat' => $rowData[0][41],
                     'Summary' => $rowData[0][42],
										 'Recommendation' => $rowData[0][43],
                     'Fit' => $Fit,
                     'AfterTX' => $AfterTX,
                     'NoteDoctor' => $rowData[0][46],
                     'NoteHR' => $rowData[0][47],
 					           'usrid' => $this->session->userdata('usernamePMR'),
	                );

	                //sesuaikan nama dengan nama tabel
	                $this->MCU_model->addMCU($data);

	            }

							$this->load->helper('file');
							unlink($inputFileName);
							redirect('MCU/Table');
				}
		}
		else {
			redirect(base_url());
		}
	}

}
?>
