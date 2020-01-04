<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMain extends CI_Model {

	public function getMasterSetoran()
	{
		$this->db->select('jenis_setoran,id');
		$this->db->from('master_jenis_setoran');
		$qyery = $this->db->get();
		return $qyery->result();

	}
	public function getSimpananAnggota()
	{
		$this->db->select('anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi');
		$this->db->from('anggota_setoran');
		$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
		$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
		$this->db->where('anggota_setoran.tipe_transaksi', 1);
		$this->db->where('anggota_setoran.id_jenis_setoran !=', 1);
		$this->db->order_by('tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file MMain.php */
/* Location: ./application/models/MMain.php */