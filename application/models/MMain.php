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
	public function getTotalSimpan()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',1);
		$query = $this->db->get();
		return $query->row();
	}
	public function getProfit()
	{
		$this->db->select('SUM(biaya_jasa) as profit');
		$this->db->from('anggota_pinjaman');
		$this->db->where('status_pinjaman', 3);
		$query = $this->db->get();
		return $query->row();
	}
	public function getBelumbayar()
	{
		$this->db->select('SUM(bayar_jasa + jumlah_angsuran) as nunggak');
		$this->db->from('anggota_pinjaman_angsuran');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPengeluran()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',0);
		$query = $this->db->get();
		return $query->row();
	}	
	function getDataAsetHari()
	{
		$q = $this->db->query("SELECT count(*) as jml FROM aset WHERE tanggal = date(NOW())");
		return $q;	
	}
	function getDataAsetMinggu()
	{
		$q = $this->db->query("SELECT count(*) as jml FROM aset WHERE YEARWEEK(tanggal)=YEARWEEK(NOW())");
		return $q;	
	}
	function getDataAsetBulan()
	{
		$q = $this->db->query("SELECT CONCAT(YEAR(tanggal),'/',MONTH(tanggal)) AS jml, COUNT(*) AS jml FROM aset WHERE CONCAT(YEAR(tanggal),'/',MONTH(tanggal))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))");
		return $q;
	}
	public function getPengeluranPinjaman()
	{
		$this->db->select('SUM(besar_persetujuan_pinjaman + biaya_jasa) as pinjam');
		$this->db->from('anggota_pinjaman');
		$this->db->where('status_pinjaman !=',0);
		$this->db->or_where('status_pinjaman !=',1);
		$query = $this->db->get();
		return $query->row();
	}
	public function getSimpananAnggota()
	{
		if ($this->session->userdata('level')=='anggota') {
			$this->db->select('anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi');
			$this->db->from('anggota_setoran');
			$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
			$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
			$this->db->where('anggota.no_anggota', $this->session->userdata('id'));
			$this->db->order_by('tgl_transaksi', 'desc');
			$query = $this->db->get();
		}else{
			$this->db->select('anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi');
			$this->db->from('anggota_setoran');
			$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
			$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
			$this->db->where('anggota_setoran.tipe_transaksi', 1);
			$this->db->where('anggota_setoran.id_jenis_setoran !=', 1);
			$this->db->order_by('tgl_transaksi', 'desc');
			$query = $this->db->get();
		}
		return $query->result();
	}
	public function login()
	{
		$no = $this->input->post('noanggota');
		$this->db->where('status !=', '2');
		$this->db->where('no_anggota', $no);
		$cek = $this->db->get('anggota');
		$row = $cek->row();
		if ($cek->num_rows() == 0 ) {
			$cekpassanggota = password_verify(''.$this->input->post('pass').'', ''.$row->password.'');
			if ($cekpassanggota == true) {
				$session1 = array('id'=> $row->no_anggota,'nohp'=>$row->no_hp,'username' => null,'nama' => $row->nama,'level'=>'anggota','kelompok'=>$row->id_kelompok);
				$this->session->set_userdata($session1);
				$val = array('success'=>true,'msg'=>'success');
			}else{
				$val = array('success'=>false,'msg'=>'Nomor Anggota Atau Password Salah');
			}
		}else{
			$this->db->where('status !=', '2');
			$this->db->where('username', $no);
			$admin = $this->db->get('akun_user');
			$rowadmin = $admin->row();
			if ($admin->num_rows() == 0 ) {
				$cekpassadmin = password_verify(''.$this->input->post('pass').'', ''.$rowadmin->password.'');
				if ($cekpassadmin == true) {
					$session2 = array('id'=> $rowadmin->id,'nohp'=>$rowadmin->no_hp,'username' => $rowadmin->username,'nama' => $rowadmin->nama,'level'=>$rowadmin->level);
					$this->session->set_userdata($session2);
					$val = array('success'=>true,'msg'=>'success');
				}else{
					$val = array('success'=>false,'msg'=>'Username Atau Password Salah');
				}
			}
		}
		echo json_encode($val);
	}
	public function register()
	{
		$no = $this->input->post('nama_lengkap');
		$no = $this->input->post('tempat_tgl');
		$no = $this->input->post('alamat');
		$no = $this->input->post('nik');
		$no = $this->input->post('no_telp');
		$no = $this->input->post('kerja');
		$this->db->insert('anggota', array(
			'nama'));
	}
}

/* End of file MMain.php */
/* Location: ./application/models/MMain.php */