<?php


class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
    		$this->load->model('User_model');
        $this->load->model('Reference_model');
    		$this->load->model('Patient_model');
    		$this->load->model('Company_model');
    		$this->load->library('session');
    		$this->load->library('Excel');
    }

    public function PrintReference($NIK, $DateReference)
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
            'size' => 16,
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
            'size' => 14,
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
    		$style_no_border = array(
          'borders' => array(
            'outline' => array(
              'style' => PHPExcel_Style_Border::BORDER_THIN
            )
          ),
					'fill' => array(
	          'type' => PHPExcel_Style_Fill::FILL_SOLID,
	          'color' => array('rgb' => 'ffffff')
	      	),
        );

        $center = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
	      );

        $left = array(
          'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
						'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
	      );

        $this->excel->setActiveSheetIndex(0);
        $this->excel->getDefaultStyle()->getFont()->setName('Calibri');
        $this->excel->getDefaultStyle()->getFont()->setSize(10);


        $Reference = $this->Reference_model->getReferenceByDetails($NIK, $DateReference);
				$Patient = $this->Patient_model->getPatientByNIK($NIK);
				$Departement = $this->Company_model->getDepartement();
				$Section = $this->Company_model->getSection();


        foreach ($Patient as $patient){
          $NIK = $patient->NIK;
          $Name = $patient->Name;
          $Sex = $patient->Sex;
          $DateBirth = $patient->DateBirth;
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
          $this->excel->getActiveSheet()->setCellValue('A1', 'RUJUKAN KARYAWAN');
          $this->excel->getActiveSheet()->mergeCells('A1:I1');
          $this->excel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($style_table_header);

          //LOG
          $this->excel->getActiveSheet()->setCellValue('A3', 'NIK');
          $this->excel->getActiveSheet()->setCellValue('A4', 'Nama');
          $this->excel->getActiveSheet()->setCellValue('A5', 'Jenis Kelamin');
          $this->excel->getActiveSheet()->setCellValue('A6', 'Tanggal Lahir');
          $this->excel->getActiveSheet()->setCellValue('D6', 'Usia');
          $this->excel->getActiveSheet()->setCellValue('A7', 'Posisi');
          $this->excel->getActiveSheet()->setCellValue('A8', 'Departement');
          $this->excel->getActiveSheet()->setCellValue('A10', 'Tanggal Dirujuk');
          $this->excel->getActiveSheet()->setCellValue('A11', 'Tujuan');
          $this->excel->getActiveSheet()->setCellValue('A12', 'Diagnosa');

          $this->excel->getActiveSheet()->setCellValue('B3', ':');
          $this->excel->getActiveSheet()->setCellValue('B4', ':');
          $this->excel->getActiveSheet()->setCellValue('B5', ':');
          $this->excel->getActiveSheet()->setCellValue('B6', ':');
          $this->excel->getActiveSheet()->setCellValue('E6', ':');
          $this->excel->getActiveSheet()->setCellValue('B7', ':');
          $this->excel->getActiveSheet()->setCellValue('B8', ':');
          $this->excel->getActiveSheet()->setCellValue('B10', ':');
          $this->excel->getActiveSheet()->setCellValue('B11', ':');
          $this->excel->getActiveSheet()->setCellValue('B12', ':');

          $this->excel->getActiveSheet()->setCellValue('C3', $NIK);
          $this->excel->getActiveSheet()->setCellValue('C4', $Name);
          $this->excel->getActiveSheet()->setCellValue('C5', $Sex);
          $this->excel->getActiveSheet()->setCellValue('C6', $DateBirth);
          $this->excel->getActiveSheet()->setCellValue('F6', $Age);
          $this->excel->getActiveSheet()->setCellValue('C7', $Job);
          $this->excel->getActiveSheet()->setCellValue('C8', $departement);
          $Purpose = '';
          $Diagnose = '';
          foreach ($Reference as $reference) {
            $DateReference = $reference->DateReference;
            if ($Purpose != ($reference->Purpose.', ')) {
              $Purpose = $Purpose.$reference->Purpose.', ';
            }
            if ($Diagnose != ($reference->Diagnose.', ')) {
              $Diagnose = $Diagnose.$reference->Diagnose.', ';
            }
          }
          $this->excel->getActiveSheet()->setCellValue('C10', $DateReference);
          $this->excel->getActiveSheet()->setCellValue('C11', $Purpose);
          $this->excel->getActiveSheet()->setCellValue('C12', $Diagnose);
          $this->excel->getActiveSheet()->getStyle('C2:C13')->applyFromArray($left);
          $this->excel->getActiveSheet()->getStyle('CG')->applyFromArray($left);


          $this->excel->getActiveSheet()->getStyle('A2:I13')->applyFromArray($style_no_border);

          $this->excel->getActiveSheet()->setCellValue('A14', 'Tanggal');
          $this->excel->getActiveSheet()->mergeCells('A14:B15');
          $this->excel->getActiveSheet()->getStyle('A14:B15')->applyFromArray($style_header);
          $this->excel->getActiveSheet()->setCellValue('C14', 'Keterangan');
          $this->excel->getActiveSheet()->mergeCells('C14:G15');
          $this->excel->getActiveSheet()->getStyle('C14:G15')->applyFromArray($style_header);
          $this->excel->getActiveSheet()->setCellValue('H14', 'Status');
          $this->excel->getActiveSheet()->mergeCells('H14:I14');
          $this->excel->getActiveSheet()->setCellValue('H15', 'Fit');
          $this->excel->getActiveSheet()->setCellValue('I15', 'Currently Unfit');
          $this->excel->getActiveSheet()->getStyle('H14:I15')->applyFromArray($style_header);
          $row =16;
          foreach ($Reference as $reference){
            $this->excel->getActiveSheet()->setCellValue('A'.$row, $reference->Date);
            $this->excel->getActiveSheet()->mergeCells('A'.$row.':B'.$row);
            $this->excel->getActiveSheet()->setCellValue('C'.$row, $reference->Note);
            $this->excel->getActiveSheet()->mergeCells('C'.$row.':G'.$row);
            if ($reference->Status == "1") {
              $this->excel->getActiveSheet()->setCellValue('H'.$row, 'X');
              $this->excel->getActiveSheet()->getStyle('H'.$row)->applyFromArray($center);
            }
            else {
              $this->excel->getActiveSheet()->setCellValue('I'.$row, 'X');
              $this->excel->getActiveSheet()->getStyle('I'.$row)->applyFromArray($center);
            }
            $row++;
            $this->excel->getActiveSheet()->getStyle('A16:I'.($row-1))->applyFromArray($style_table);
          }
        }



        $this->excel->getActiveSheet()->setTitle('Data Referral Pasien');

        $filename= 'Data Pasien Referral.xlsx'; //save our workbook as this file name



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
