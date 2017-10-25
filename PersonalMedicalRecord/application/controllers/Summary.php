<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Summary extends CI_Controller {

	public function Summary(){
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('User_model');
    $this->load->model('Patient_model');
    $this->load->model('MCU_model');
    $this->load->model('OnSite_model');
    $this->load->model('OffSite_model');
		$this->load->model('Reference_model');
		$this->load->model('Company_model');
		$this->load->library('session');
    $this->load->library('Excel');
	}

	public function Index(){
    if ($this->session->userdata('rolePMR')) {
				$data['main'] = "PMR";
				$data['sub'] = "";
        $NIK = 'thereisnoNIKHERE';
        $data['Export'] = '';
				$data['Patient'] = $this->Patient_model->getPatientByNIK($NIK);
        $data['OnSite'] = $this->OnSite_model->getOnSiteByNIK($NIK);
        $data['OffSite'] = $this->OffSite_model->getOffSiteByNIK($NIK);
        $data['MCU'] = $this->MCU_model->getMCUByNIK($NIK);
        $data['Reference'] = $this->Reference_model->getReferenceByNIK($NIK);
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('Summary', $data);
    }else {
      redirect(base_url());
    }
	}

	public function Filter()
	{
    if ($this->session->userdata('rolePMR')) {
        $data['NIK'] = $this->input->post('NIK');
				$data['main'] = "PMR";
				$data['sub'] = "";
        $data['Export'] = '1';
				$data['Patient'] = $this->Patient_model->getPatientByNIK($data['NIK']);
        $data['OnSite'] = $this->OnSite_model->getOnSiteByNIK($data['NIK']);
        $data['OffSite'] = $this->OffSite_model->getOffSiteByNIK($data['NIK']);
        $data['MCU'] = $this->MCU_model->getMCUByNIK($data['NIK']);
        $data['Reference'] = $this->Reference_model->getReferenceByNIK($data['NIK']);
				$data['Departement'] = $this->Company_model->getDepartement();
				$data['Section'] = $this->Company_model->getSection();
		    $this->load->view('Summary', $data);
    }else {
      redirect(base_url());
    }
	}

  public function Export($NIK)
	{
    if ($this->session->userdata('rolePMR')) {

      $Departement = $this->Company_model->getDepartement();
      $Section = $this->Company_model->getSection();
      $Patient = $this->Patient_model->getPatientByNIK($NIK);
      $this->excel->getDefaultStyle()->getFont()->setName('Calibri');
      $this->excel->getDefaultStyle()->getFont()->setSize(10);


      //MEDICAL CHECK UP
      $mcu_table_header = array(
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
      $mcu_title = array(
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
      $mcu_header = array(
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
      $mcu_subheader = array(
        'font' => array(
          'bold' => true,
        ),
      );
      $mcu_subsubheader = array(
        'font' => array(
          'color' => array('rgb' => 'f44242'),
        ),
      );
      $mcu_program = array(
        'font' => array(
          'color' => array('rgb' => '425cf4'),
        ),
      );
      $mcu_table = array(
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
             )
      );

      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Data MCU Pasien');


      $MCU = $this->MCU_model->getMCUByNIK($NIK);


      $this->excel->getActiveSheet()->setCellValue('A1', 'SUMMARY MEDICAL CHECK UP, PT KASONGAN BUMI KENCANA');
      $this->excel->getActiveSheet()->mergeCells('A1:AV1');
      $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($mcu_title);

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
      $this->excel->getActiveSheet()->getStyle('A2:K2')->applyFromArray($mcu_table_header);
      //VITAL SIGN
      $this->excel->getActiveSheet()->setCellValue('L3', 'BP');
      $this->excel->getActiveSheet()->setCellValue('M3', 'Pulse');
      $this->excel->getActiveSheet()->setCellValue('N3', 'Resp');
      $this->excel->getActiveSheet()->setCellValue('O3', 'Height');
      $this->excel->getActiveSheet()->setCellValue('P3', 'Weight');
      $this->excel->getActiveSheet()->setCellValue('Q3', 'BMI');
      $this->excel->getActiveSheet()->setCellValue('L2', 'VITAL SIGN');
      $this->excel->getActiveSheet()->mergeCells('L2:Q2');
      $this->excel->getActiveSheet()->getStyle('L2:Q2')->applyFromArray($mcu_table_header);
      //EYES EXAMINATION
      $this->excel->getActiveSheet()->setCellValue('R3', 'VOD');
      $this->excel->getActiveSheet()->setCellValue('S3', 'VOS');
      $this->excel->getActiveSheet()->setCellValue('T3', 'VOD/S');
      $this->excel->getActiveSheet()->setCellValue('U3', 'Color Blind');
      $this->excel->getActiveSheet()->setCellValue('V3', 'Eyes');
      $this->excel->getActiveSheet()->setCellValue('R2', 'EYES EXAMINATION');
      $this->excel->getActiveSheet()->mergeCells('R2:V2');
      $this->excel->getActiveSheet()->getStyle('R2:V2')->applyFromArray($mcu_table_header);
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
      $this->excel->getActiveSheet()->getStyle('W2:AG2')->applyFromArray($mcu_table_header);
      //ADDITIONAL EXAMINATION
      $this->excel->getActiveSheet()->setCellValue('AH3', 'Audiometry');
      $this->excel->getActiveSheet()->setCellValue('AI3', 'Spirometry');
      $this->excel->getActiveSheet()->setCellValue('AJ3', 'ECG');
      $this->excel->getActiveSheet()->setCellValue('AK3', 'X-Ray');
      $this->excel->getActiveSheet()->setCellValue('AH2', 'ADDITIONAL EXAMINATION');
      $this->excel->getActiveSheet()->mergeCells('AH2:AK2');
      $this->excel->getActiveSheet()->getStyle('AH2:AK2')->applyFromArray($mcu_table_header);
      //LABORATORY
      $this->excel->getActiveSheet()->setCellValue('AL3', 'Hematology');
      $this->excel->getActiveSheet()->setCellValue('AM3', 'Urinalisis');
      $this->excel->getActiveSheet()->setCellValue('AN3', 'Biokimia');
      $this->excel->getActiveSheet()->setCellValue('AO3', 'Serology');
      $this->excel->getActiveSheet()->setCellValue('AP3', 'Logam Berat');
      $this->excel->getActiveSheet()->setCellValue('AL2', 'LABORATORY');
      $this->excel->getActiveSheet()->mergeCells('AL2:AP2');
      $this->excel->getActiveSheet()->getStyle('AL2:AP2')->applyFromArray($mcu_table_header);
      //CONCLUSION
      $this->excel->getActiveSheet()->setCellValue('AQ3', 'Summary');
      $this->excel->getActiveSheet()->setCellValue('AR3', 'Recommendation');
      $this->excel->getActiveSheet()->setCellValue('AS3', 'Fit');
      $this->excel->getActiveSheet()->setCellValue('AT3', 'After TX');
      $this->excel->getActiveSheet()->setCellValue('AQ2', 'CONCLUSION');
      $this->excel->getActiveSheet()->mergeCells('AQ2:AT2');
      $this->excel->getActiveSheet()->getStyle('AQ2:AT2')->applyFromArray($mcu_table_header);
      //Note
      $this->excel->getActiveSheet()->setCellValue('AU3', 'Doctor Onsite');
      $this->excel->getActiveSheet()->setCellValue('AV3', 'HR');
      $this->excel->getActiveSheet()->setCellValue('AU2', 'NOTE');
      $this->excel->getActiveSheet()->mergeCells('AU2:AV2');
      $this->excel->getActiveSheet()->getStyle('AU2:AV2')->applyFromArray($mcu_table_header);

      $this->excel->getActiveSheet()->getStyle('A3:AV3')->applyFromArray($mcu_header);

			foreach ($Patient as $patient){
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

      $row=4;
      $no = 1;
      foreach ($MCU as $mcu) {
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
        $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->Fit);
        $col++;
        $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->AfterTX);
        $col++;
        $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->NoteDoctor);
        $col++;
        $this->excel->getActiveSheet()->setCellValue($col.$row, $mcu->NoteHR);
        $row++;
				$this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($mcu_table);
      }


      //END OF MEDICAL CHECK UP


      //ON SITE LOG
      $onsite_table_header = array(
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
      $onsite_title = array(
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
      $onsite_header = array(
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
      $onsite_subheader = array(
        'font' => array(
          'bold' => true,
        ),
      );
      $onsite_subsubheader = array(
        'font' => array(
          'color' => array('rgb' => 'f44242'),
        ),
      );
      $onsite_program = array(
        'font' => array(
          'color' => array('rgb' => '425cf4'),
        ),
      );
      $onsite_table = array(
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

      $this->excel->createSheet();
      $this->excel->setActiveSheetIndex(1);
      $this->excel->getActiveSheet()->setTitle('Data OnSite Pasien');


      $OnSite = $this->OnSite_model->getOnSiteByNIK($NIK);


      $this->excel->getActiveSheet()->setCellValue('A1', 'DAILY PATIENT & CONSULTATION LOG FORM');
      $this->excel->getActiveSheet()->mergeCells('A1:U1');
      $this->excel->getActiveSheet()->getStyle('A1')->applyFromArray($onsite_title);

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
			$this->excel->getActiveSheet()->getStyle('A3:V3')->applyFromArray($onsite_table_header);

      $row=4;
      $no = 1;
      foreach ($OnSite as $onsite) {
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
				$this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($onsite_table);
      }


      //END ON SITE LOG

      //OFF SITE LOG
      $offsite_table_header = array(
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

      $offsite_title = array(
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

      $offsite_header = array(
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
      $offsite_subheader = array(
        'font' => array(
          'bold' => true,
        ),
      );

      $offsite_subsubheader = array(
        'font' => array(
          'color' => array('rgb' => 'f44242'),
        ),
      );
      $offsite_program = array(
        'font' => array(
          'color' => array('rgb' => '425cf4'),
        ),
      );
      $offsite_table = array(
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

      $this->excel->createSheet();
      $this->excel->setActiveSheetIndex(2);
      $this->excel->getActiveSheet()->setTitle('Data OffSite Pasien');


      $OffSite = $this->OffSite_model->getOffSiteByNIK($NIK);


      $this->excel->getActiveSheet()->setCellValue('A1', 'Rekam Medis Off Site');
      $this->excel->getActiveSheet()->mergeCells('A1:G1');
      $this->excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($offsite_title);

      //LOG
      $this->excel->getActiveSheet()->setCellValue('A3', 'NIK');
      $this->excel->getActiveSheet()->setCellValue('B3', 'Nama Karyawan');
      $this->excel->getActiveSheet()->setCellValue('C3', 'Departement');
      $this->excel->getActiveSheet()->setCellValue('D3', 'Jabatan');
      $this->excel->getActiveSheet()->setCellValue('E3', 'Tanggal Pemeriksaan');
      $this->excel->getActiveSheet()->setCellValue('F3', 'Diagnosa');
      $this->excel->getActiveSheet()->setCellValue('G3', 'Terapi');
      $this->excel->getActiveSheet()->getStyle('A3:G3')->applyFromArray($offsite_table_header);

      $row=4;
      $no = 1;
      foreach ($OffSite as $offsite) {
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
				$this->excel->getActiveSheet()->getStyle('A3:'.$col.($row-1))->applyFromArray($offsite_table);
      }


      //END OFF SITE LOG

      //REFERENCE
      $reference_table_header = array(
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

      $reference_title = array(
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

      $reference_header = array(
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
      $reference_subheader = array(
        'font' => array(
          'bold' => true,
        ),
      );

      $reference_subsubheader = array(
        'font' => array(
          'color' => array('rgb' => 'f44242'),
        ),
      );
      $reference_program = array(
        'font' => array(
          'color' => array('rgb' => '425cf4'),
        ),
      );
      $reference_table = array(
            'borders' => array(
              'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
             )
      );
      $reference_no_border = array(
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

      $this->excel->createSheet();
      $this->excel->setActiveSheetIndex(3);
      $this->excel->getActiveSheet()->setTitle('Data Referral Pasien');


      $Reference = $this->Reference_model->getReferenceByNIK($NIK);


      foreach ($Patient as $patient){
        $this->excel->getActiveSheet()->setCellValue('A1', 'RUJUKAN KARYAWAN');
        $this->excel->getActiveSheet()->mergeCells('A1:I1');
        $this->excel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($reference_table_header);

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
        $DateReference = '';
        foreach ($Reference as $reference) {
          if ($Purpose != ($reference->Purpose.', ')) {
            $Purpose = $Purpose.$reference->Purpose.', ';
          }
          if ($Diagnose != ($reference->Diagnose.', ')) {
            $Diagnose = $Diagnose.$reference->Diagnose.', ';
          }
        }
        $this->excel->getActiveSheet()->setCellValue('C10', 'Terlampir Pada Table');
        $this->excel->getActiveSheet()->setCellValue('C11', $Purpose);
        $this->excel->getActiveSheet()->setCellValue('C12', $Diagnose);
        $this->excel->getActiveSheet()->getStyle('C2:C13')->applyFromArray($left);
        $this->excel->getActiveSheet()->getStyle('CG')->applyFromArray($left);


        $this->excel->getActiveSheet()->getStyle('A2:I13')->applyFromArray($reference_no_border);

        $this->excel->getActiveSheet()->setCellValue('A14', 'Tanggal');
        $this->excel->getActiveSheet()->mergeCells('A14:B14');
        $this->excel->getActiveSheet()->setCellValue('A15', 'Reference');
        $this->excel->getActiveSheet()->setCellValue('B15', 'Check');
        $this->excel->getActiveSheet()->getStyle('A14:B15')->applyFromArray($reference_header);
        $this->excel->getActiveSheet()->setCellValue('C14', 'Keterangan');
        $this->excel->getActiveSheet()->mergeCells('C14:G15');
        $this->excel->getActiveSheet()->getStyle('C14:G15')->applyFromArray($reference_header);
        $this->excel->getActiveSheet()->setCellValue('H14', 'Status');
        $this->excel->getActiveSheet()->mergeCells('H14:I14');
        $this->excel->getActiveSheet()->setCellValue('H15', 'Fit');
        $this->excel->getActiveSheet()->setCellValue('I15', 'Currently Unfit');
        $this->excel->getActiveSheet()->getStyle('H14:I15')->applyFromArray($reference_header);
        $row =16;
        foreach ($Reference as $reference){
          $this->excel->getActiveSheet()->setCellValue('A'.$row, $reference->DateReference);
          $this->excel->getActiveSheet()->setCellValue('B'.$row, $reference->Date);
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
        }
        $this->excel->getActiveSheet()->getStyle('A16:I'.($row-1))->applyFromArray($reference_table);

      }
      //END OF REFERENCE

      $filename= 'Personal Medical Record '.$NIK.'.xlsx'; //save our workbook as this file name



      header('Content-Type: application/vnd.ms-excel'); //mime type
      header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
      header('Cache-Control: max-age=0'); //no cache

      $objWriter = IOFactory::createWriter($this->excel, 'Excel2007');
      $objWriter->save('php://output');
    }else {
      redirect(base_url());
    }
	}
}
?>
