<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpanController extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model('MSimpan', 'ms');
	}
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
	public function Simpanan()
	{
		try {
			$this->db->select('saldo_akhir');
			$this->db->from('anggota_setoran');
			$this->db->where('id_anggota', $this->session->userdata('id'));
			$this->db->order_by('saldo_akhir', 'desc');
			$get= $this->db->get()->row();
			if ($this->input->post('noanggota') == null) {
				$session = $this->session->userdata('id');
			}else{
				$session = $this->input->post('noanggota');
			}
			$data = array(
				'id_anggota'=>$session,
				'tipe_transaksi'=>'1',
				'id_jenis_setoran'=>$this->input->post('jenis_setoran'),
				'jumlah_transaksi'=>$this->input->post('jumlah'),
				'tgl_transaksi'=>$this->input->post('set-tanggal'),
				'saldo_akhir'=> ($get->saldo_akhir+$this->input->post('jumlah')),
				'metode_bayar'=>$this->input->post('sistem_bayar'),
				'id_petugas'=>$this->input->post('idpetugas'),
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