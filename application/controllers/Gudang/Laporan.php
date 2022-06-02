<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file','indonesian_date'));
		$this->load->model('M_laporan_nota');
	}
	// // Tampilan Halaman Awal Shuttle 2
	// public function index()
	// {
	// 	$c['content'] = $this->load->view('gudang/content');
	// 	$this->load->view('gudang/home_gudang',$c);
	// }

	public function laporan_nota_cetak($id)
	{
		$header=$this->M_laporan_nota->header_nota($id);
		$detail=$this->M_laporan_nota->detail_nota($id);
		include_once './assets/cexcel/Classes/PHPExcel.php';
		date_default_timezone_set('Asia/Jakarta');
		$objPHPExcel = new PHPExcel();

		// $bulan =  $this->input->post('bulan');
		// $tahun =  $this->input->post('tahun');
		// $data  =  $this->M_laporan_nota->nota_print($bulan,$tahun);
	
		$objPHPExcel = new PHPExcel(); 
		$objPHPExcel->setActiveSheetIndex(0);
		$rowCount = 15;
		
		$objPHPExcel->getSheet(0)->mergeCells('A1:D1');
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(1);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(1);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(9);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', "PC. GKBI");
		$objPHPExcel->getActiveSheet()->getStyle('A1:L46')->getFont()->setName('MS Sans Serif');
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);		
		$objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
		$objPHPExcel->getSheet(0)->mergeCells('A2:F2');
		$objPHPExcel->getActiveSheet()->SetCellValue('A2', "(Pabrik Cambric Gabungan Koperasi Batik Indonesia)");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setName('MS Sans Serif');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getSheet(0)->mergeCells('A3:F3');
		$objPHPExcel->getActiveSheet()->SetCellValue('A3', "Jl. Magelang KM. 14, Medari - Sleman - Jogjakarta 55514");
		$objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getSheet(0)->mergeCells('A4:F4');
		$objPHPExcel->getActiveSheet()->SetCellValue('A4', "Telp. (0274) 868513, 868312, 868421");
		$objPHPExcel->getActiveSheet()->getStyle('A4')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getSheet(0)->mergeCells('A5:F5');
		$objPHPExcel->getActiveSheet()->SetCellValue('A5', "Fax (0274) 868411");
		$objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	    $objPHPExcel->getSheet(0)->mergeCells('A6:F6');
		$objPHPExcel->getActiveSheet()->SetCellValue('A6', "E-mail: pcgkbi@indosat.net.id");
		$objPHPExcel->getActiveSheet()->getStyle('A6')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getSheet(0)->mergeCells('A9:B9');
		$objPHPExcel->getActiveSheet()->SetCellValue('A9', "Order Penjualan");
		$objPHPExcel->getActiveSheet()->getStyle('A9')->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle('A9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	    $objPHPExcel->getSheet(0)->mergeCells('A11:B11');
		$objPHPExcel->getActiveSheet()->SetCellValue('A11', "Tanggal");
		$objPHPExcel->getActiveSheet()->getStyle('A11')->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle('A11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getActiveSheet()->SetCellValue('C9', ":");
		$objPHPExcel->getActiveSheet()->getStyle('C9')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('C9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getActiveSheet()->SetCellValue('C11', ":");
		$objPHPExcel->getActiveSheet()->getStyle('C11')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('C11')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

//////
		$objPHPExcel->getSheet(0)->mergeCells('K1:L1');
		$objPHPExcel->getActiveSheet()->SetCellValue('K1', "                F.NGD. 05");
		$objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setSize(11);
		$objPHPExcel->getActiveSheet()->getStyle('K1')->getFont()->setBold(true);	
		$objPHPExcel->getActiveSheet()->getStyle('K1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
		$objPHPExcel->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);


		$objPHPExcel->getSheet(0)->mergeCells('G2:L3');
		$objPHPExcel->getActiveSheet()->SetCellValue('G2', "Nota Pengeluaran Barang");
		$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setSize(18);
		$objPHPExcel->getActiveSheet()->getStyle('G2')->getFont()->setBold(true);	
		$objPHPExcel->getActiveSheet()->getStyle('G2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	    $objPHPExcel->getSheet(0)->mergeCells('G4:H4');
		$objPHPExcel->getActiveSheet()->SetCellValue('G4', "   Nomor");
		$objPHPExcel->getActiveSheet()->getStyle('G4')->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getSheet(0)->mergeCells('G6:H6');
		$objPHPExcel->getActiveSheet()->SetCellValue('G6', "   Kepada Yth");
		$objPHPExcel->getActiveSheet()->getStyle('G6')->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getStyle('G6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getActiveSheet()->SetCellValue('I4', ":");
		$objPHPExcel->getActiveSheet()->getStyle('I4')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('I4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

		$objPHPExcel->getActiveSheet()->SetCellValue('I6', ":");
		$objPHPExcel->getActiveSheet()->getStyle('I6')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('I6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
///////

    	$objPHPExcel->getSheet(0)->mergeCells('A38:D38');
		$objPHPExcel->getActiveSheet()->SetCellValue('A38', "Barang tersebut dikirim dalam ");
		$objPHPExcel->getActiveSheet()->getStyle('A38')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A38')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
    	$objPHPExcel->getSheet(0)->mergeCells('A39:D39');
		$objPHPExcel->getActiveSheet()->SetCellValue('A39', "keadaan     utuh    dan    baik");
		$objPHPExcel->getActiveSheet()->getStyle('A39')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A39')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

    	$objPHPExcel->getSheet(0)->mergeCells('A41:B41');
		$objPHPExcel->getActiveSheet()->SetCellValue('A41', "Accounting");
		$objPHPExcel->getActiveSheet()->getStyle('A41')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('A41:B41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
    	$objPHPExcel->getSheet(0)->mergeCells('A46:B46');
		$objPHPExcel->getActiveSheet()->SetCellValue('A46', "(  Gigih W.  )");
		$objPHPExcel->getActiveSheet()->getStyle('A46')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A46:B46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    	$objPHPExcel->getSheet(0)->mergeCells('C41:E41');
		$objPHPExcel->getActiveSheet()->SetCellValue('C41', "Penerima / Angkutan");
		$objPHPExcel->getActiveSheet()->getStyle('C41')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('C41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getSheet(0)->mergeCells('C42:E42');
		$objPHPExcel->getActiveSheet()->SetCellValue('C42', "   No. Pol :");
		$objPHPExcel->getActiveSheet()->getStyle('C42')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('C42')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		
    	$objPHPExcel->getSheet(0)->mergeCells('C46:E46');
		$objPHPExcel->getActiveSheet()->SetCellValue('C46', "(........................)");
		$objPHPExcel->getActiveSheet()->getStyle('C46')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('C46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getSheet(0)->mergeCells('F41:G41');
		$objPHPExcel->getActiveSheet()->SetCellValue('F41', "Penerima Barang");
		$objPHPExcel->getActiveSheet()->getStyle('F41')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('F41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
    	$objPHPExcel->getSheet(0)->mergeCells('F46:G46');
		$objPHPExcel->getActiveSheet()->SetCellValue('F46', "(........................)");
		$objPHPExcel->getActiveSheet()->getStyle('F46')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('F46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getSheet(0)->mergeCells('H41:J41');
		$objPHPExcel->getActiveSheet()->SetCellValue('H41', "Satpam");
		$objPHPExcel->getActiveSheet()->getStyle('H41')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('H41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
    	$objPHPExcel->getSheet(0)->mergeCells('H46:J46');
		$objPHPExcel->getActiveSheet()->SetCellValue('H46', "(........................)");
		$objPHPExcel->getActiveSheet()->getStyle('H46')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('H46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$objPHPExcel->getSheet(0)->mergeCells('K41:L41');
		$objPHPExcel->getActiveSheet()->SetCellValue('K41', "Gudang Niaga");
		$objPHPExcel->getActiveSheet()->getStyle('K41')->getFont()->setSize(10);	
		$objPHPExcel->getActiveSheet()->getStyle('K41')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
    	$objPHPExcel->getSheet(0)->mergeCells('K46:L46');
		$objPHPExcel->getActiveSheet()->SetCellValue('K46', "(  Musabih ZB.  )");
		$objPHPExcel->getActiveSheet()->getStyle('K46')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('K46')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

	    // $objPHPExcel->getSheet(0)->mergeCells('J24');
		$objPHPExcel->getActiveSheet()->SetCellValue('J39', "Medari,");
		$objPHPExcel->getActiveSheet()->getStyle('J39')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('J39')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

///////		
    	$objPHPExcel->getSheet(0)->mergeCells('A13:F14');
		$objPHPExcel->getActiveSheet()->SetCellValue('A13', " Satuan Barang ");
		$objPHPExcel->getActiveSheet()->getStyle('A13')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('A13')->getFont()->setBold(true);	
		$objPHPExcel->getActiveSheet()->getStyle('A13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('A13')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	    $objPHPExcel->getSheet(0)->mergeCells('G13:L14');
		$objPHPExcel->getActiveSheet()->SetCellValue('G13', " Keterangan ");
		$objPHPExcel->getActiveSheet()->getStyle('G13')->getFont()->setSize(10);
		$objPHPExcel->getActiveSheet()->getStyle('G13')->getFont()->setBold(true);	
		$objPHPExcel->getActiveSheet()->getStyle('G13')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objPHPExcel->getActiveSheet()->getStyle('G13')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

///////
		// Set Orientation, size and scaling
		$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
		$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

//////
		//Margin
		// $objPHPExcel->getActiveSheet()->getPageMargins()->setTop(0.75);
		// $objPHPExcel->getActiveSheet()->getPageMargins()->setRight(1.10);
		// $objPHPExcel->getActiveSheet()->getPageMargins()->setLeft(1.00);
		// $objPHPExcel->getActiveSheet()->getPageMargins()->setBottom(0.60);
      
		// set datatable header
		foreach ($header as $value) {

			$objPHPExcel->getSheet(0)->mergeCells('J4:L4');
			$objPHPExcel->getActiveSheet()->getStyle('J4')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('J4')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->SetCellValue('J4', $value->nomor);

			$objPHPExcel->getSheet(0)->mergeCells('J6:L11');
			$objPHPExcel->getActiveSheet()->getStyle('J6')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('J6')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->getStyle('J6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$objPHPExcel->getActiveSheet()->getStyle('J6:J'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->SetCellValue('J6', $value->tujuan);

			$objPHPExcel->getSheet(0)->mergeCells('D9:F9');			
			$objPHPExcel->getActiveSheet()->getStyle('D9')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('D9')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->SetCellValue('D9', $value->order_penj);

			$objPHPExcel->getSheet(0)->mergeCells('D11:F11');
			$objPHPExcel->getActiveSheet()->getStyle('D11')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('D11')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->SetCellValue('D11', indonesian_date($value->tgl_order));

			$objPHPExcel->getSheet(0)->mergeCells('K39:L39');
			$objPHPExcel->getActiveSheet()->getStyle('K39')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('K39')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->SetCellValue('K39', indonesian_date($value->tgl_nota));

			$objPHPExcel->getSheet(0)->mergeCells('G31:L36');
			$objPHPExcel->getActiveSheet()->getStyle('G31')->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('G31')->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->getStyle('G31')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
			$objPHPExcel->getActiveSheet()->getStyle('G31:G'.$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
			$objPHPExcel->getActiveSheet()->SetCellValue('G31', $value->ket);
		}

		// set datatable detail
		foreach($detail as $value){
			$objPHPExcel->getActiveSheet()->getStyle('A' .$rowCount.':'.'L'.$rowCount)->getFont()->setSize(10);	
			$objPHPExcel->getActiveSheet()->getStyle('A' .$rowCount.':'.'L'.$rowCount)->getFont()->setBold(true);	
			$objPHPExcel->getActiveSheet()->getStyle('A' .$rowCount.':'.'L'.$rowCount)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
			
			$objPHPExcel->getSheet(0)->mergeCells('A'.$rowCount.':'.'C'.$rowCount);
			$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->sat1);

			$objPHPExcel->getSheet(0)->mergeCells('D'.$rowCount.':'.'F'.$rowCount);
			$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $value->sat2);

			$objPHPExcel->getSheet(0)->mergeCells('G'.$rowCount.':'.'L'.$rowCount);
			$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $value->nama_brg);
			$rowCount++;
		}
		//  Border Data		

			$stylebottom = array(
			  'borders' => array(
			    'bottom' => array(
			      'style' => PHPExcel_Style_Border::BORDER_THIN
			    )
			  )
			);
			$objPHPExcel->getActiveSheet()->getStyle('A36:L36')->applyFromArray($stylebottom);
			unset($stylebottom);
			
			$styletop = array(
			  'borders' => array(
			    'top' => array(
			      'style' => PHPExcel_Style_Border::BORDER_THIN
			    )
			  )
			);
			$objPHPExcel->getActiveSheet()->getStyle('A13:L13')->applyFromArray($styletop);
			unset($styletop);

			$styledobel = array(
			  'borders' => array(
			    'bottom' => array(
			      'style' => PHPExcel_Style_Border::BORDER_DOUBLE
			    )
			  )
			);
			$objPHPExcel->getActiveSheet()->getStyle('A14:L14')->applyFromArray($styledobel);
			unset($styledobel);

			$styleright = array(
			  'borders' => array(
			    'right' => array(
			      'style' => PHPExcel_Style_Border::BORDER_THIN
			    )
			  )
			);
			$objPHPExcel->getActiveSheet()->getStyle('F13:F36')->applyFromArray($styleright);
			$objPHPExcel->getActiveSheet()->getStyle('C15:C36')->applyFromArray($styleright);
			unset($styleright);
		// $objPHPExcel->getActiveSheet()->getStyle('A4:E'.($rowCount-1))->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));

		// set autosize
		// $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		// $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		// $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		// $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		// $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);     
       

		 
		// set output
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
        sleep(1);
        $filename = 'Nota'.date('d-m-Y H-i').'.xlsx';
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Disposition: attachment; filename="'.$filename.'"');
        header("Cache-Control: max-age=0");
        ob_clean();
        $objWriter->save("php://output");
        $objPHPExcel->disconnectWorksheets();
		unset($objPHPExcel);
	}
}