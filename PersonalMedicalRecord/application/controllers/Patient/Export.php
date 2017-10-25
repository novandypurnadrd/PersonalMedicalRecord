<?php


class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
    		$this->load->model('User_model');
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



        $Patient = $this->Patient_model->getPatient();
        $Departement = $this->Company_model->getDepartement();
        $Section = $this->Company_model->getSection();


        $this->excel->getActiveSheet()->setCellValue('A2', 'No');
        $this->excel->getActiveSheet()->setCellValue('B2', 'Name');
        $this->excel->getActiveSheet()->setCellValue('C2', 'Date of Birth');
        $this->excel->getActiveSheet()->setCellValue('D2', 'Age');
        $this->excel->getActiveSheet()->setCellValue('E2', 'Sex');
        $this->excel->getActiveSheet()->setCellValue('F2', 'Departement');
        $this->excel->getActiveSheet()->setCellValue('G2', 'Section');
        $this->excel->getActiveSheet()->setCellValue('H2', 'Job');
        $this->excel->getActiveSheet()->setCellValue('I2', 'Site');
        $this->excel->getActiveSheet()->setCellValue('J2', 'Company');
        $this->excel->getActiveSheet()->setCellValue('K2', 'Telp');
        $this->excel->getActiveSheet()->setCellValue('L2', 'Emergency');
        $this->excel->getActiveSheet()->setCellValue('M2', 'Allergy');
        $this->excel->getActiveSheet()->setCellValue('N2', 'Status');
        $this->excel->getActiveSheet()->getStyle('A2:N2')->applyFromArray($style_table_header);

        $row=3;
        $no = 1;
        foreach ($Patient as $patient) {
          $col='A';
            $this->excel->getActiveSheet()->setCellValue($col.$row, $no);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Name);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->DateBirth);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Age);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Sex);
            $col++;
            foreach ($Departement as $departement) {
              if ($patient->Departement == $departement->id){
                $this->excel->getActiveSheet()->setCellValue($col.$row, $departement->departement);
              }
            }
            $col++;
            foreach ($Section as $section) {
              if ($patient->Section == $section->id){
                $this->excel->getActiveSheet()->setCellValue($col.$row, $section->section);
              }
            }
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Job);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Site);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Company);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Telp);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Emergency);
            $col++;
            $this->excel->getActiveSheet()->setCellValue($col.$row, $patient->Allergy);
            $col++;
            if ($patient->Status == "1") {
              $this->excel->getActiveSheet()->setCellValue($col.$row, "ACITVE");
            }
            else {
              $this->excel->getActiveSheet()->setCellValue($col.$row, "INACTIVE");
            }
            $row++;
            $no++;
            $this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($style_table);
        }


        $this->excel->getActiveSheet()->setTitle('Data Pasien Terdaftar');

        $filename= 'Data Pasien Terdaftar.xlsx'; //save our workbook as this file name



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
