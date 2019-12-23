<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpanController extends CI_Controller {


    $this->load->model('MPokok', 'mp');
    $this->load->model('MWajib', 'mw');
    $this->load->model('MSuka', 'ms');
    $this->load->model('MCicil', 'mc');

	public function resultRespone($data)
	{
		$respone = array(
			'data'=>$data->result(),
			'row'=>$data->row(),
			'success'=>true,
		);
		echo json_encode($respone);
	}
	public function successRespone($msg)
	{
		$respone = array(
			'success'=>true,
			'msg'=>$msg,
		);
		echo json_encode($respone);
	}
	public function failedRespone()
	{
		$respone = array(
			'success'=>false,
			'msg'=>'Gagal',
		);
		echo json_encode($respone);
	}
	public function failedFecthData($msg)
	{
		$respone = array(
			'success'=>false,
			'msg'=>$msg,
		);
		echo json_encode($respone);
	}
	public function SimpnanPokok()
	{
		try {
			$data = array(
				'nama'=>$this->session->userdata('nama'),
				'jenisSimpanan'=>$this->input->post('jenis'),
				'jumlah'=>$this->input->post('jumlah'),
				'angsuran'=>$this->input->post('angsuran'),
				'jasa'=>$this->input->post('jasa'),
				'total'=>$this->input->post('total'),
			);
			$query = $this->mp->insert($data);
			if ($query == true) {
				$msg = 'Data Berhasil di Simpan';
				$json = $this->successRespone($msg);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			$this->failedFecthData($e);
		}
	}
	public function simpananWajib()
	{
		try {
			$data = array(
				'nama'=>$this->session->userdata('nama'),
				'jenisSimpanan'=>$this->input->post('jenis'),
				'jumlah'=>$this->input->post('jumlah'),
				'jenisBayar'=>$this->input->post('jenisBayar'),
				'total'=>$this->input->post('total'),
			);
			$query = $this->mw->insert($data);
			if ($query == true) {
				$msg = 'Data Berhasil di Simpan';
				$json = $this->successRespone($msg);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			$this->failedFecthData($e);
		}

	}
	public function simpananSukarela()
	{
		try {
			$data = array(
				'nama'=>$this->session->userdata('nama'),
				'jumlah'=>$this->input->post('jumlah'),
				'jenisBayar'=>$this->input->post('jenisBayar'),
				'total'=>$this->input->post('total'),
			);
			$query = $this->ms->insert($data);
			if ($query == true) {
				$msg = 'Data Berhasil di Simpan';
				$json = $this->successRespone($msg);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			$this->failedFecthData($e);
		}
	}
	public function Helper()
	{
		// $this->load->helper('my_helper');
		// number_to_words('jumlahnya')
	}
}

/* End of file SimpanController.php */
/* Location: ./application/controllers/SimpanController.php */