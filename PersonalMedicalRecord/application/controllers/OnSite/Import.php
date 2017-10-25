
<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	public function Import(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('OnSite_model');
		$this->load->library('session');
		$this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "OnSite";
        $data['sub'] = "importOnSite";
				$data['hidden'] = "yes";
		    $this->load->view('OnSite/Import', $data);
    }else {
      redirect(base_url());
    }
	}

	public function ImportOnSite(){
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
					$data['main'] = "OnSite";
	        $data['sub'] = "importOnSite";
					$this->load->view('Daily/OnSite/Import', $data);
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

	            for ($row = 5; $row <= $highestRow; $row++){                  //  Read a row of data into an array
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                                NULL,
	                                                TRUE,
	                                                FALSE);

									$temp = (int)$rowData[0][1];
								  $DateOnSite = new DateTime("1899-12-30 + $temp days");
									// echo $dateTime->format("Y-m-d")."</br>";
									$DateOnSite = $DateOnSite->format("Y-m-d");

									$cell = $sheet->getCellByColumnAndRow(2, $row);
									$time = PHPExcel_Style_NumberFormat::toFormattedString($cell->getCalculatedValue(), 'h.i A');
									$hours = explode('.',$time)[0];
									$i = explode('.',$time)[1];
									if ($hours > 12) {
										$hours = $hours - 12;
										$hours = floor($hours);
										$mins = explode(' ', $i)[0];
										if ($hours < 10) {
											$time = '0'.$hours.':'.$mins.' '.explode(' ', $i)[1];
										}
										else {
											$time = $hours.':'.$mins.' '.explode(' ', $i)[1];
										}
									}
									else {
										$mins = explode(' ', $i)[0];
										if ($hours < 10) {
											$time = '0'.$hours.':'.$mins.' '.explode(' ', $i)[1];
										}
										else {
											$time = $hours.':'.$mins.' '.explode(' ', $i)[1];
										}
									}

									$NIK = explode('/',$rowData[0][3])[0];

	                // Sesuaikan sama nama kolom tabel di database
	                 $data = array(
                     'Number' => $rowData[0][0],
                     'Date' => $DateOnSite,
                     'Time' => $time,
                     'NIK' => $NIK,
                     'Patient' => $rowData[0][8],
                     'Nationality' => $rowData[0][9],
                     'Consultation' => $rowData[0][10],
                     'CaseType' => $rowData[0][11],
                     'Incident' => $rowData[0][12],
                     'Subjective' => $rowData[0][13],
                     'Objective' => $rowData[0][14],
                     'Assessment' => $rowData[0][15],
										 'Plan' => $rowData[0][16],
                     'Education' => $rowData[0][17],
                     'Treatment' => $rowData[0][18],
                     'Medications' => $rowData[0][19],
                     'Fitness' => $rowData[0][20],
                     'Staff' => $rowData[0][21],
 					           'usrid' => $this->session->userdata('usernamePMR'),
	                );

	                //sesuaikan nama dengan nama tabel
	                $this->OnSite_model->addOnSite($data);

	            }

							$this->load->helper('file');
							unlink($inputFileName);
							redirect('OnSite/Table');
				}
		}
		else {
			redirect(base_url());
		}
	}

}
?>
