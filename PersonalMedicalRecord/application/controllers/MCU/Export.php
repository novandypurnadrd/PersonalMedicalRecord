<?php


class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
    		$this->load->model('User_model');
        $this->load->model('MCU_model');
    		$this->load->model('Patient_model');
    		$this->load->model('Company_model');
    		$this->load->library('session');
    		$this->load->library('Excel');
    }

    public function Index()
    {
      if ($this->session->userdata("role")) {

        //FORMAT
        $style_table_header = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
          ),
          'font' => array(
            'bold' => true,
          ),
					'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => 'f4bc42')
        	)
        );
        $style_title = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
          'borders' => array(
            'allborders' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN,
            ),
          ),
          'font' => array(
            'bold' => true,
            'size' => 36,
          )
        );
    		$style_header = array(
	        'borders' => array(
	          'allborders' => array(
	            'style' => PHPExcel_Style_Border::BORDER_THIN,
	          ),
	        ),
	        'font' => array(
	          'bold' => true,
	        ),
					'fill' => array(
	          'type' => PHPExcel_Style_Fill::FILL_SOLID,
	          'color' => array('rgb' => '636261')
	      	)
	      );
    		$style_subheader = array(
					'font' => array(
						'bold' => true,
					),
				);
    		$style_subsubheader = array(
					'font' => array(
						'color' => array('rgb' => 'f44242'),
					),
				);
    		$style_program = array(
					'font' => array(
						'color' => array('rgb' => '425cf4'),
					),
				);
        $style_table = array(
              'borders' => array(
                'allborders' => array(
                  'style' => PHPExcel_Style_Border::BORDER_THIN,
                      ),
               )
        );
    		$footer = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          ),
					'borders' => array(
	          'allborders' => array(
	            'style' => PHPExcel_Style_Border::BORDER_THIN,
	          ),
	        ),
	        'font' => array(
	          'bold' => true,
	        ),
					'fill' => array(
	          'type' => PHPExcel_Style_Fill::FILL_SOLID,
	          'color' => array('rgb' => 'f4bc42')
	      	)
        );

        $this->excel->setActiveSheetIndex(0);
        $this->excel->getDefaultStyle()->getFont()->setName('Calibri');
        $this->excel->getDefaultStyle()->getFont()->setSize(10);


        $MCU = $this->MCU_model->getMCU();
        $Patient = $this->Patient_model->getPatient();
        $Departement = $this->Company_model->getDepartement();
        $Section = $this->Company_model->getSection();


        $this->excel->getActiveSheet()->setCellValue('A1', 'SUMMARY MEDICAL CHECK UP, PT KASONGAN BUMI KENCANA');
        $this->excel->getActiveSheet()->mergeCells('A1:AV1');
        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_title);

        //IDENTITY
        $this->excel->getActiveSheet()->setCellValue('A3', 'NIK');
        $this->excel->getActiveSheet()->setCellValue('B3', 'Name');
        $this->excel->getActiveSheet()->setCellValue('C3', 'Age');
        $this->excel->getActiveSheet()->setCellValue('D3', 'Sex');
        $this->excel->getActiveSheet()->setCellValue('E3', 'Job');
        $this->excel->getActiveSheet()->setCellValue('F3', 'Departement/Section');
        $this->excel->getActiveSheet()->setCellValue('G3', 'Site');
        $this->excel->getActiveSheet()->setCellValue('H3', 'Company');
        $this->excel->getActiveSheet()->setCellValue('I3', 'Date MCU');
        $this->excel->getActiveSheet()->setCellValue('J3', 'Date Result');
        $this->excel->getActiveSheet()->setCellValue('K3', 'Type MCU');
        $this->excel->getActiveSheet()->setCellValue('A2', 'IDENTITY');
        $this->excel->getActiveSheet()->mergeCells('A2:K2');
        $this->excel->getActiveSheet()->getStyle('A2:K2')->applyFromArray($style_table_header);
        //VITAL SIGN
        $this->excel->getActiveSheet()->setCellValue('L3', 'BP');
        $this->excel->getActiveSheet()->setCellValue('M3', 'Pulse');
        $this->excel->getActiveSheet()->setCellValue('N3', 'Resp');
        $this->excel->getActiveSheet()->setCellValue('O3', 'Height');
        $this->excel->getActiveSheet()->setCellValue('P3', 'Weight');
        $this->excel->getActiveSheet()->setCellValue('Q3', 'BMI');
        $this->excel->getActiveSheet()->setCellValue('L2', 'VITAL SIGN');
        $this->excel->getActiveSheet()->mergeCells('L2:Q2');
        $this->excel->getActiveSheet()->getStyle('L2:Q2')->applyFromArray($style_table_header);
        //EYES EXAMINATION
        $this->excel->getActiveSheet()->setCellValue('R3', 'VOD');
        $this->excel->getActiveSheet()->setCellValue('S3', 'VOS');
        $this->excel->getActiveSheet()->setCellValue('T3', 'VOD/S');
        $this->excel->getActiveSheet()->setCellValue('U3', 'Color Blind');
        $this->excel->getActiveSheet()->setCellValue('V3', 'Eyes');
        $this->excel->getActiveSheet()->setCellValue('R2', 'EYES EXAMINATION');
        $this->excel->getActiveSheet()->mergeCells('R2:V2');
        $this->excel->getActiveSheet()->getStyle('R2:V2')->applyFromArray($style_table_header);
        //PHYSICAL EXAMINATION
        $this->excel->getActiveSheet()->setCellValue('W3', 'ENT');
        $this->excel->getActiveSheet()->setCellValue('X3', 'Heart');
        $this->excel->getActiveSheet()->setCellValue('Y3', 'Lung');
        $this->excel->getActiveSheet()->setCellValue('Z3', 'Abd');
        $this->excel->getActiveSheet()->setCellValue('AA3', 'Hand');
        $this->excel->getActiveSheet()->setCellValue('AB3', 'Leg');
        $this->excel->getActiveSheet()->setCellValue('AC3', 'Paresis/Parelisa');
        $this->excel->getActiveSheet()->setCellValue('AD3', 'Edema');
        $this->excel->getActiveSheet()->setCellValue('AE3', 'Skin');
        $this->excel->getActiveSheet()->setCellValue('AF3', 'Genital');
        $this->excel->getActiveSheet()->setCellValue('AG3', 'Varices');
        $this->excel->getActiveSheet()->setCellValue('W2', 'PHYSICAL EXAMINATION');
        $this->excel->getActiveSheet()->mergeCells('W2:AG2');
        $this->excel->getActiveSheet()->getStyle('W2:AG2')->applyFromArray($style_table_header);
        //ADDITIONAL EXAMINATION
        $this->excel->getActiveSheet()->setCellValue('AH3', 'Audiometry');
        $this->excel->getActiveSheet()->setCellValue('AI3', 'Spirometry');
        $this->excel->getActiveSheet()->setCellValue('AJ3', 'ECG');
        $this->excel->getActiveSheet()->setCellValue('AK3', 'X-Ray');
        $this->excel->getActiveSheet()->setCellValue('AH2', 'ADDITIONAL EXAMINATION');
        $this->excel->getActiveSheet()->mergeCells('AH2:AK2');
        $this->excel->getActiveSheet()->getStyle('AH2:AK2')->applyFromArray($style_table_header);
        //LABORATORY
        $this->excel->getActiveSheet()->setCellValue('AL3', 'Hematology');
        $this->excel->getActiveSheet()->setCellValue('AM3', 'Urinalisis');
        $this->excel->getActiveSheet()->setCellValue('AN3', 'Biokimia');
        $this->excel->getActiveSheet()->setCellValue('AO3', 'Serology');
        $this->excel->getActiveSheet()->setCellValue('AP3', 'Logam Berat');
        $this->excel->getActiveSheet()->setCellValue('AL2', 'LABORATORY');
        $this->excel->getActiveSheet()->mergeCells('AL2:AP2');
        $this->excel->getActiveSheet()->getStyle('AL2:AP2')->applyFromArray($style_table_header);
        //CONCLUSION
        $this->excel->getActiveSheet()->setCellValue('AQ3', 'Summary');
        $this->excel->getActiveSheet()->setCellValue('AR3', 'Recommendation');
        $this->excel->getActiveSheet()->setCellValue('AS3', 'Fit');
        $this->excel->getActiveSheet()->setCellValue('AT3', 'After TX');
        $this->excel->getActiveSheet()->setCellValue('AQ2', 'CONCLUSION');
        $this->excel->getActiveSheet()->mergeCells('AQ2:AT2');
        $this->excel->getActiveSheet()->getStyle('AQ2:AT2')->applyFromArray($style_table_header);
        //Note
        $this->excel->getActiveSheet()->setCellValue('AU3', 'Doctor Onsite');
        $this->excel->getActiveSheet()->setCellValue('AV3', 'HR');
        $this->excel->getActiveSheet()->setCellValue('AU2', 'NOTE');
        $this->excel->getActiveSheet()->mergeCells('AU2:AV2');
        $this->excel->getActiveSheet()->getStyle('AU2:AV2')->applyFromArray($style_table_header);

        $this->excel->getActiveSheet()->getStyle('A3:AV3')->applyFromArray($style_header);

        $row=4;
        $no = 1;
        foreach ($MCU as $mcu) {
          foreach ($Patient as $patient){
            if ($patient->NIK == $mcu->NIK){
              $Name = $patient->Name;
              $Sex = $patient->Sex;
              $Age = $patient->Age;
              $Site = $patient->Site;
              $Company = $patient->Company;
              $Job = $patient->Job;
              foreach ($Departement as $dept) {
                if ($dept->id == $patient->Departement) {
                  $departement = $dept->departement;
                }
              }
              foreach ($Section as $sect) {
                if ($sect->id == $patient->Section) {
                  $section =  $sect->section;
                }
              }
            }
          }
          $col='A';
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->NIK);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Name);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Sex);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Age);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Job);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $departement.'/'.$section);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Site);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Company);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, date("d-M-Y", strtotime($mcu->DateMCU)));
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, date("d-M-Y", strtotime($mcu->DateResult)));
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Type);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->BP);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Pulse);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Resp);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Height);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Weight);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->BMI);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->VOD);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->VOS);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->VODS);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->ColorBlind);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Eyes);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->ENT);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Heart);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Lung);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Abd);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Hand);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Leg);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Paresis);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Edema);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Skin);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Genital);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Varices);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Audiometry);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Spirometry);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->ECG);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->XRay);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Hematology);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Urinalisis);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Biokimia);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Serology);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->LogamBerat);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Summary);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Recommendation);
          $col++;
          if ($mcu->Fit == "1") {
            $fit = "FIT";
          }
          else {
            $fit = "CURRENTLY UNFIT";
          }
          $this->excel->getActiveSheet()->setCellValue($col.$row, $fit);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->AfterTX);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->NoteDoctor);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->NoteHR);
          $row++;
        }

        $this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($style_table);


        $this->excel->getActiveSheet()->setTitle('Data MCU Pasien');

        $filename= 'Data MCU Pasien.xlsx'; //save our workbook as this file name



        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $objWriter = IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter->save('php://output');

      }
      else {
        redirect('Enviro');
      }
    }
}

?>
