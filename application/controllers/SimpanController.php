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
	public function AccSimpananAnggota()
	{
		try {
			$this->db->select('saldo_akhir,jumlah_transaksi');
			$this->db->from('anggota_setoran');
			$this->db->where('id',$this->input->post('id'));
			$this->db->order_by('saldo_akhir', 'desc');
			$get= $this->db->get()->row();

			if ($this->input->post('status') == 1) {
				$hasil = $get->saldo_akhir+$get->jumlah_transaksi;
			}else{
				$hasil = $get->saldo_akhir;
			}
			
			$data = array(
				'sistem_bayar'=>'1',
				'saldo_akhir'=> $hasil,
				'status'=>$this->input->post('status'),
			);

			$where = array(
				'id'=>$this->input->post('id')
			);

			$query = $this->ms->update($data,$where);
			if ($query == true) {
				$msg = 'Data Berhasil di Ubah';
				$json = $this->successRespone($msg);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			$this->failedFecthData($e);
		}
	}
	public function Simpanan()
	{
		try {
			if ($this->input->post('noanggota') == null) {
				$session = $this->session->userdata('id');
			}else{
				$session = $this->input->post('noanggota');
			}
			$this->db->select('saldo_akhir');
			$this->db->from('anggota_setoran');
			$this->db->where('id_anggota', $session);
			$this->db->order_by('saldo_akhir', 'desc');
			$get= $this->db->get()->row();

			if ($this->input->post('jumlah_pokok') == null AND $this->input->post('jumlah_wajib') == null) {
				$jumlahnya = $this->input->post('jumlah_suka');
			}else if ($this->input->post('jumlah_suka')== null AND $this->input->post('jumlah_pokok') == null) {
				$jumlahnya = $this->input->post('jumlah_wajib');
			}else if ($this->input->post('jumlah_suka') == null AND $this->input->post('jumlah_wajib')== null) {
				$jumlahnya = $this->input->post('jumlah_pokok');
			}
			$gambar = $this->Uploadfoto($this->input->post('filenya'));
			$data = array(
				'id_anggota'=>$session,
				'tipe_transaksi'=>'1',
				'id_jenis_setoran'=>$this->input->post('jenis_setoran'),
				'jumlah_transaksi'=>$jumlahnya,
				'tgl_transaksi'=>$this->input->post('set-tanggal'),
				'saldo_akhir'=> ($get->saldo_akhir),
				'metode_bayar'=>$this->input->post('sistem_bayar'),
				'bukti_transfer'=>$gambar,
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
	public function Uploadfoto($param)
	{
		$config['upload_path'] = './assets/images/bukti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']             = 10024;
		$config['encrypt_name']         = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->load->library('upload', $config);
		$upload = $this->upload->do_upload($param);
		$data = $this->upload->data();
		if (! $upload) {
			$image = null;
		}else{
			$image = $data['file_name'];
		}
		return $image;
	}
	public function Helper()
	{
		// $this->load->helper('my_helper');
		// number_to_words('jumlahnya')
	}
}

/* End of file SimpanController.php */
/* Location: ./application/controllers/SimpanController.php */