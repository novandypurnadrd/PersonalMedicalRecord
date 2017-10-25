<?php


class Export extends CI_Controller {
    public function __construct() {
        parent::__construct();
    		$this->load->model('User_model');
        $this->load->model('OffSite_model');
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


        $OffSite = $this->OffSite_model->getOffSite();
        $Patient = $this->Patient_model->getPatient();
        $Departement = $this->Company_model->getDepartement();
        $Section = $this->Company_model->getSection();


        $this->excel->getActiveSheet()->setCellValue('A1', 'Rekam Medis Off Site');
        $this->excel->getActiveSheet()->mergeCells('A1:G1');
        $this->excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($style_title);

        //LOG
        $this->excel->getActiveSheet()->setCellValue('A3', 'NIK');
        $this->excel->getActiveSheet()->setCellValue('B3', 'Nama Karyawan');
        $this->excel->getActiveSheet()->setCellValue('C3', 'Departement');
        $this->excel->getActiveSheet()->setCellValue('D3', 'Jabatan');
        $this->excel->getActiveSheet()->setCellValue('E3', 'Tanggal Pemeriksaan');
        $this->excel->getActiveSheet()->setCellValue('F3', 'Diagnosa');
        $this->excel->getActiveSheet()->setCellValue('G3', 'Terapi');
        $this->excel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($style_table_header);

        $row=4;
        $no = 1;
        foreach ($OffSite as $offsite) {
          foreach ($Patient as $patient){
            if ($patient->NIK == $offsite->NIK){
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
          $this->excel->getActiveSheet()->setCellValue($col.$row, $offsite->NIK);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Name);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $departement);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $Job);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $offsite->Date);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $offsite->Diagnose);
          $col++;
          $this->excel->getActiveSheet()->setCellValue($col.$row, $offsite->Therapy);
          $row++;
          $this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($style_table);
        }




        $this->excel->getActiveSheet()->setTitle('Data OffSite Pasien');

        $filename= 'Data Pasien OffSite.xlsx'; //save our workbook as this file name



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
