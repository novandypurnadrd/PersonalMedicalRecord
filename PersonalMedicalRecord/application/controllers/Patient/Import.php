
<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

	public function Import(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
		$this->load->model('Patient_model');
		$this->load->model('Company_model');
		$this->load->library('session');
		$this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "Patient";
        $data['sub'] = "importPatient";
				$data['hidden'] = "yes";
		    $this->load->view('Patient/Import', $data);
    }else {
      redirect(base_url());
    }
	}

	public function ImportPatient(){
		$Departement = $this->Company_model->getDepartement();
		$Section = $this->Company_model->getSection();
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
					$data['main'] = "Patient";
	        $data['sub'] = "importPatient";
					$this->load->view('Daily/Patient/Import', $data);
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

	            for ($row = 7; $row <= $highestRow; $row++){                  //  Read a row of data into an array
	                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
	                                                NULL,
	                                                TRUE,
	                                                FALSE);

									$temp = (int)$rowData[0][8];
								  $DateBirth = new DateTime("1899-12-30 + $temp days");
									$DateBirth = $DateBirth->format("Y-m-d");
                  $from = new DateTime($DateBirth);
                  $to   = new DateTime('today');
                  $age = $from->diff($to);

									if ($rowData[0][3] == "1") {
										$Sex = "MALE";
									}
									else {
										$Sex = "FEMALE";
									}

									foreach ($Departement as $table) {
										if (strcasecmp($table->departement, $rowData[0][12]) == 0) {
											$departement = $table->id;
										}
									}
									foreach ($Section as $table) {
										if (strcasecmp($table->section, $rowData[0][11]) == 0) {
											$section = $table->id;
										}
									}

	                // Sesuaikan sama nama kolom tabel di database
	                 $data = array(
                     'NIK' => $rowData[0][1],
             				 'Name' => $rowData[0][2],
                     'DateBirth' => $DateBirth,
                     'Age' => $age->format('%y years'),
                     'Sex' => $Sex,
										 'Job' => $rowData[0][10],
                     'Section' => $section,
                     'Departement' => $departement,
                     'Site' => "MIRAH",
                     'Company' => "PT. KASONGAN BUMI KENCANA",
                     'Telp' => $rowData[0][9],
										 'Emergency' => $rowData[0][17],
                     'Relation' => $rowData[0][16],
										 'Status' => '1',
 					           'usrid' => $this->session->userdata('usernamePMR'),
	                );

	                //sesuaikan nama dengan nama tabel
	                $this->Patient_model->addPatient($data);

	            }

							$this->load->helper('file');
							unlink($inputFileName);
							redirect('Patient/Table');
				}
		}
		else {
			redirect(base_url());
		}
	}

}
?>
