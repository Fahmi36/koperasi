<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamController extends CI_Controller {

    $this->load->model('MSimpan', 'ms');
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
	public function pinjamUang()
	{
		try {
			$data = array(
				'idAnggota'=>$this->session->userdata('id'),
				'noHp'=>$this->session->post('nohp'),
				'noRekening'=>$this->input->post('norek'),
				'jumlah'=>$this->input->post('jumlah'),
				'keperluan'=>$this->input->post('keperluan'),
				'total'=>$this->input->post('total'),
				'cicil'=> $this->input->post('cicil'),
			);
			$query = $this->ms->insert($data);
			if ($query == true) {
				$msg = 'Data Berhasil di Simpan';
				$json = $this->successRespone($msg);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			
		}
	}

}

/* End of file PinjamController.php */
/* Location: ./application/controllers/PinjamController.php */