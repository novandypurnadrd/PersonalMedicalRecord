<?php


class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
    		$this->load->model('User_model');
        $this->load->model('OnSite_model');
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
            'size' => 24,
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


        $OnSite = $this->OnSite_model->getOnSite();
        $Patient = $this->Patient_model->getPatient();
        $Departement = $this->Company_model->getDepartement();
        $Section = $this->Company_model->getSection();


        $this->excel->getActiveSheet()->setCellValue('A1', 'DAILY PATIENT & CONSULTATION LOG FORM');
        $this->excel->getActiveSheet()->mergeCells('A1:U1');
        $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_title);

        //LOG
        $this->excel->getActiveSheet()->setCellValue('A3', 'Patient Number');
        $this->excel->getActiveSheet()->setCellValue('B3', 'Date of Consultation');
        $this->excel->getActiveSheet()->setCellValue('C3', 'Time of Consultation');
        $this->excel->getActiveSheet()->setCellValue('D3', 'ID/Dept/Title');
        $this->excel->getActiveSheet()->setCellValue('E3', 'Patient Name');
        $this->excel->getActiveSheet()->setCellValue('F3', 'DOB & Age');
        $this->excel->getActiveSheet()->setCellValue('G3', 'Company');
        $this->excel->getActiveSheet()->setCellValue('H3', 'Gender');
        $this->excel->getActiveSheet()->setCellValue('I3', 'Patient Type');
        $this->excel->getActiveSheet()->setCellValue('J3', 'Nationality');
        $this->excel->getActiveSheet()->setCellValue('K3', 'Consultation Type');
        $this->excel->getActiveSheet()->setCellValue('L3', 'Case');
        $this->excel->getActiveSheet()->setCellValue('M3', 'Incident Type');
        $this->excel->getActiveSheet()->setCellValue('N3', 'Subjective');
        $this->excel->getActiveSheet()->setCellValue('O3', 'Objective');
        $this->excel->getActiveSheet()->setCellValue('P3', 'Assessment');
        $this->excel->getActiveSheet()->setCellValue('Q3', 'Plan & Prescriptions');
        $this->excel->getActiveSheet()->setCellValue('R3', 'Education');
        $this->excel->getActiveSheet()->setCellValue('S3', 'Treatment Provided');
        $this->excel->getActiveSheet()->setCellValue('T3', 'Medications Prescribed');
        $this->excel->getActiveSheet()->setCellValue('U3', 'Fitness Status');
        $this->excel->getActiveSheet()->setCellValue('V3', 'Medical Staff Name');
        $this->excel->getActiveSheet()->getStyle('A3:V3')->applyFromArray($style_table_header);

        $row=4;
        $no = 1;
        foreach ($OnSite as $onsite) {
          foreach ($Patient as $patient){
            if ($patient->NIK == $onsite->NIK){
              $DateBirth = $patient->DateBirth;
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
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Number);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Date);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Time);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->NIK.'/'.$departement.'/'.$Job);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Name);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $DateBirth.'/ '.$Age.'yrs');
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Company);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Sex);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Patient);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Nationality);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Consultation);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->CaseType);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Incident);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Subjective);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Objective);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Assessment);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Plan);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Education);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Treatment);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Medications);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Fitness);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $onsite->Staff);
          $row++;
          $this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($style_table);
        }




        $this->excel->getActiveSheet()->setTitle('Data OnSite Pasien');

        $filename= 'Data Pasien OnSite.xlsx'; //save our workbook as this file name



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
