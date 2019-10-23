<?php
require APPPATH.'third_party/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class controllers extends CI_Controller{
	public function index(){
		$this->load->view('home');
	}
	public function inputData(){
		$nama=$this->input->post('nama');
		$npm=$this->input->post('npm');
		$tempatlahir=$this->input->post('tempatlahir');
		$tanggal=$this->input->post('tanggallahir');
		$tanggallahir=date("d-m-Y", strtotime($tanggal));;
		$agama=$this->input->post('agama');
		$alamat=$this->input->post('alamat');
		$templama=$this->input->post('temp');

		if (empty($nama) or empty($npm) or empty($tempatlahir) or empty($tanggallahir) or empty($agama) or empty($alamat)) {
            echo "<script>alert('Mohon Periksa Kembali Data Masukan');history.go(-1);</script>";
		} else {
			if(!empty($templama)){
				$temp=array();
				array_push($temp, $nama,$npm,$tempatlahir,$tanggallahir,$agama,$alamat);
				$baru['data']=array_merge($templama,$temp);
				$this->load->view('data', $baru);
			} else{
				$temp['data']=array();
				array_push($temp['data'], $nama,$npm,$tempatlahir,$tanggallahir,$agama,$alamat);
				$this->load->view('data', $temp);
			}
		}
	}
	public function tambahData(){
		$temp['data']=$this->input->post('data');

		$this->load->view('home', $temp);
	}
	public function exportData(){
		$data=$this->input->post('data');

		$spreadsheet = new Spreadsheet();

		$spreadsheet->getProperties()->setCreator('Fatoni')
		->setLastModifiedBy('Fatoni')
		->setTitle('Data Export')
		->setSubject('Data Export')
		->setDescription('Data Export');

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A1', 'NO')
		->setCellValue('B1', 'NAMA')
		->setCellValue('C1', 'NPM')
		->setCellValue('D1', 'TEMPAT LAHIR')
		->setCellValue('E1', 'TEMPAT TINGGAL')
		->setCellValue('F1', 'AGAMA')
		->setCellValue('G1', 'ALAMAT');

		$param1=(count($data)/6)+2;
		$param2=0;
		$no=1;
		for ($i=2; $i < $param1; $i++) { 
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $no++)
			->setCellValue('B'.$i, $data[$param2++])
			->setCellValue('C'.$i, $data[$param2++])
			->setCellValue('D'.$i, $data[$param2++])
			->setCellValue('E'.$i, $data[$param2++])
			->setCellValue('F'.$i, $data[$param2++])
			->setCellValue('G'.$i, $data[$param2++]);
		}

		$spreadsheet->getActiveSheet()->setTitle('Excel Export '.date('d-m-Y H'));

		$spreadsheet->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');

		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); 
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); 
		header('Cache-Control: cache, must-revalidate'); 
		header('Pragma: public'); 

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

}

?>