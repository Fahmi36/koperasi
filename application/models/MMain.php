<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MMain extends CI_Model {

	public function getUser() 
	{
		$row = $this->db->get_where('anggota',array('id_anggota'=>$this->session->userdata('id')));
		return $row->row();
	}
	public function getAnggota()
	{
		$row = $this->db->get_where('anggota',array('status'=>'1'));
		return $row->result();
	}
	public function getMasterSetoran()
	{
		$this->db->select('jenis_setoran,id');
		$this->db->from('master_jenis_setoran');
		$qyery = $this->db->get();
		return $qyery->result();

	}
	public function getDataPinjaman($id)
	{
		$query = $this->db->get_where('anggota_pinjaman',array('id'=>$id,'status_pinjaman'=>6,'id_anggota'=>$this->session->userdata('id')));
		if ($query->num_rows() == 0) {
			redirect('/');
		}else{
			return $query->row();
		}

	}
	public function getProfile()
	{
		if ($this->session->userdata('username') == null) {
			$this->db->from('anggota');
			$this->db->where('id_anggota', $this->session->userdata('id'));
			$query = $this->db->get();
		}else{
			$this->db->from('akun_user');
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get();
		}
		return $query->row();
	}
	public function getTotalSimpan()
	{
		if ($this->session->userdata('username') == null) {
			$this->db->select('SUM(jumlah_transaksi) as simpan');
			$this->db->from('anggota_setoran');
			$this->db->where('tipe_transaksi',1);
			$this->db->where('status',1);
			$this->db->where('id_anggota', $this->session->userdata('id'));
			$query = $this->db->get();
		}else{
			$this->db->select('SUM(jumlah_transaksi) as simpan');
			$this->db->from('anggota_setoran');
			$this->db->where('tipe_transaksi',1);
			$query = $this->db->get();
		}
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
		if ($this->session->userdata('username') != null) {
			$this->db->select('SUM(cicil.jasa + cicil.jumlah_bayar) as nunggak');
			$this->db->from('cicil');
			$this->db->join('anggota_pinjaman', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
			$this->db->where_in('cicil.status', [2,3]);
			$this->db->where('tgl_tempo <', date('Y-m-d'));
			$query = $this->db->get();
		}else{
			$this->db->select('SUM(jumlah_bayar + jasa) as nunggak');
			$this->db->from('cicil');
			$this->db->join('anggota_pinjaman', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
			$this->db->where('anggota_pinjaman.id_anggota', $this->session->userdata('id'));
			$this->db->where_in('status', [2,3]);
			$query = $this->db->get();
		}
		return $query->row();
	}
	public function getPrintSimpanan($id)
	{ 
		$this->db->select('akun_user.username as admin, anggota_setoran.metode_bayar,anggota_setoran.jumlah_transaksi,anggota_setoran.jenis_setoran,anggota_setoran.tgl_transaksi,anggota.no_anggota,anggota.nama,anggota_setoran.id_petugas');
		$this->db->from('anggota_setoran');
		$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'inner');
		$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'Inner');
		$this->db->join('akun_user', 'anggota_setoran.accby = akun_user.id', 'left');
		$this->db->where('anggota_setoran.id',$id);
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
	public function getSimpananWajib($id='')
	{
		if ($id!='') {
			$this->db->select('SUM(jumlah_transaksi) as simpan');
			$this->db->from('anggota_setoran');
			$this->db->where('tipe_transaksi',1);
			$this->db->where('id_jenis_setoran', 2);
			$this->db->where('status', 1);
			$this->db->where('id_anggota', $id);
			$query = $this->db->get();
			return $query->row()->simpan;
		}else{
			$this->db->select('SUM(jumlah_transaksi) as simpan');
			$this->db->from('anggota_setoran');
			$this->db->where('tipe_transaksi',1);
			$this->db->where('id_jenis_setoran', 2);
			$this->db->where('status', 1);
			$this->db->where('id_anggota', $this->session->userdata('id_anggota'));
			$query = $this->db->get();
			return $query->row();
		}
		
	}
	public function getSimpananSukarela($id)
	{
			$this->db->select('SUM(jumlah_transaksi) as suka');
			$this->db->from('anggota_setoran');
			$this->db->where('tipe_transaksi',1);
			$this->db->where('id_jenis_setoran', 3);
			$this->db->where('status', 1);
			$this->db->where('id_anggota', $id);
			$query = $this->db->get();
			return $query->row()->suka;
		
	}
	public function getJatuhTempo()
	{
		$this->db->select('tgl_tempo');
		$this->db->from('cicil');
		$this->db->join('anggota_pinjaman', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
		$this->db->where('anggota_pinjaman.id_anggota', $this->session->userdata('id_anggota'));
		$this->db->where('cicil.tipe_cicil',1);
		$this->db->where('cicil.status',2);
		$this->db->group_by('cicil.status');
		$this->db->order_by('cicil.tgl_tempo', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}
	public function getTotalSimpanhari()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',1);
		$this->db->where('tgl_transaksi',date(NOW()));
		$query = $this->db->get();
		return $query->row();
	}
	public function getProfithari()
	{
		$this->db->select('SUM(biaya_jasa) as profit');
		$this->db->from('anggota_pinjaman');
		$this->db->where('status_pinjaman', 3);
		$this->db->where('tgl_pengajuan_pinjaman', date(NOW()));
		$query = $this->db->get();
		return $query->row();
	}
	public function getBelumbayarhari()
	{
		$this->db->select('SUM(bayar_jasa + jumlah_angsuran) as nunggak');
		$this->db->from('anggota_pinjaman_angsuran');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPengeluranhari()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',0);
		$query = $this->db->get();
		return $query->row();
	}	
	public function getTotalSimpanminggu()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',1);
		$query = $this->db->get();
		return $query->row();
	}
	public function getProfitminggu()
	{
		$this->db->select('SUM(biaya_jasa) as profit');
		$this->db->from('anggota_pinjaman');
		$this->db->where('status_pinjaman', 3);
		$this->db->where('YEARWEEK(tgl_pengajuan_pinjaman)', YEARWEEK(NOW()));
		$query = $this->db->get();
		return $query->row();
	}
	public function getBelumbayarminggu()
	{
		$this->db->select('SUM(bayar_jasa + jumlah_angsuran) as nunggak');
		$this->db->from('anggota_pinjaman_angsuran');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPengeluranminggu()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getTotalSimpanbulan()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',1);
		$query = $this->db->get();
		return $query->row();
	}
	public function getProfitbulan()
	{
		$this->db->select('SUM(biaya_jasa) as profit');
		$this->db->from('anggota_pinjaman');
		$this->db->where('status_pinjaman', 3);
		$this->db->where('CONCAT(YEAR(tgl_pengajuan_pinjaman),'/',MONTH(tgl_pengajuan_pinjaman))', CONCAT(YEAR(NOW()),'/',MONTH(NOW())));
		$query = $this->db->get();
		return $query->row();
	}
	public function getBelumbayarbulan()
	{
		$this->db->select('SUM(bayar_jasa + jumlah_angsuran) as nunggak');
		$this->db->from('anggota_pinjaman_angsuran');
		$this->db->where('status', 0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPengeluranbulan()
	{
		$this->db->select('SUM(jumlah_transaksi) as simpan');
		$this->db->from('anggota_setoran');
		$this->db->where('tipe_transaksi',0);
		$query = $this->db->get();
		return $query->row();
	}
	public function getPengeluranPinjaman()
	{
		$this->db->select('SUM(besar_persetujuan_pinjaman + biaya_jasa) as pinjam');
		$this->db->from('anggota_pinjaman');
		$this->db->where_in('status_pinjaman',[2,3]);
		$query = $this->db->get();
		return $query->row();
	}
	public function getSimpananAnggota()
	{
		if ($this->session->userdata('level')=='anggota') {
			$this->db->select('anggota_setoran.id,anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.jumlah_transaksi as saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi,anggota_setoran.status');
			$this->db->from('anggota_setoran');
			$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
			$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
			$this->db->where('anggota.no_anggota', $this->session->userdata('id_anggota'));
			$this->db->order_by('tgl_transaksi', 'desc');
			$query = $this->db->get();
			// return var_dump($this->db->last_query());
		}else{
			$this->db->select('anggota_setoran.id,anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.jumlah_transaksi as saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi,anggota_setoran.status');
			$this->db->from('anggota_setoran');
			$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
			$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
			$this->db->where('anggota_setoran.tipe_transaksi', 1);
			$this->db->where('anggota_setoran.id_jenis_setoran !=', 1);
			$this->db->where('anggota_setoran.status', 1);
			$this->db->order_by('tgl_transaksi', 'desc'); 
			$query = $this->db->get();
		}
		return $query->result();
	}
	public function getSimpananBelumVerif()
	{
		$this->db->select('anggota_setoran.id,anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.jumlah_transaksi as saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi,anggota_setoran.status');
		$this->db->from('anggota_setoran');
		$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
		$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
		$this->db->where('anggota_setoran.tipe_transaksi', 1);
		$this->db->where('anggota_setoran.id_jenis_setoran !=', 1);
		$this->db->where_in('anggota_setoran.status', [0,2]);
		$this->db->order_by('tgl_transaksi', 'desc'); 
		$query = $this->db->get();
		return $query->result();
	}
	public function login()
	{
		$no = $this->input->post('noanggota');
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('status !=', '2');
		$this->db->where('no_anggota', $no);
		$cek = $this->db->get();
		$row = $cek->row();
		// var_dump(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
		if ($cek->num_rows() != 0 ) {
			$cekpassanggota = password_verify(''.$this->input->post('password').'', ''.$row->password.'');
			if ($cekpassanggota == true) {
				$session1 = array('id'=>$row->id_anggota,'id_anggota'=> $row->no_anggota,'nohp'=>$row->no_hp,'no_rek'=>$row->no_rek,'username' => null,'nama' => $row->nama,'level'=>'anggota','kelompok'=>$row->id_kelompok,'status'=>$row->status);
				$this->session->set_userdata($session1);
				$val = array('success'=>true,'msg'=>'success');
			}else{
				$val = array('success'=>false,'msg'=>'Nomor Anggota Atau Password Salah');
			}
		}else{
			$this->db->select('*');
			$this->db->from('akun_user');
			$this->db->where('status !=', '2');
			$this->db->where('username', $no);
			$admin = $this->db->get();
			$rowadmin = $admin->row();
			if ($admin->num_rows() != 0 ) {
				$cekpassadmin = password_verify(''.$this->input->post('password').'', ''.$rowadmin->password.'');
				if ($cekpassadmin == true) {
					$session2 = array('id'=> $rowadmin->id,'nohp'=>$rowadmin->no_hp,'username' => $rowadmin->username,'nama' => $rowadmin->nama,'level'=>$rowadmin->level);
					$this->session->set_userdata($session2);
					$val = array('success'=>true,'msg'=>'success');
				}else{
					$val = array('success'=>false,'msg'=>'Username Atau Password Salah');
				}
			}else{
				$val = array('success'=>false,'msg'=>'data tidak ada');
			}
		}
		echo json_encode($val);
	}
	public function getKelompok()
	{
		$this->db->select('master_kelompok.kelompok,anggota.no_hp,anggota.no_rek');
		$this->db->from('anggota');
		$this->db->join('master_kelompok', 'anggota.id_kelompok = master_kelompok.id', 'left');
		$this->db->where('master_kelompok.id', $this->session->userdata('kelompok'));
		$query = $this->db->get();
		return $query->row();
	}
	public function getNamaKelompok()
	{
		$this->db->where('id !=',6);
		return $this->db->get('master_kelompok')->result();
	}
	public function getAngsuran($id='')
	{
		if ($id == null) {
			redirect('/');
		}else{
			$this->db->select('id_angsuran,jasa,jumlah_bayar,tgl_tempo');
			$this->db->from('cicil');
			$this->db->where('id_angsuran', $id);
			$this->db->where('tipe_cicil',1);
			$query = $this->db->get();
			return $query->result();
		}
	}
	public function getDetailSimpanan()
	{
		$this->db->select('anggota_setoran.id,anggota.nama,master_jenis_setoran.jenis_setoran,anggota_setoran.jumlah_transaksi, anggota_setoran.saldo_akhir,anggota_setoran.tipe_transaksi,anggota_setoran.tgl_transaksi,anggota_setoran.status,anggota_setoran.metode_bayar,anggota_setoran.bukti_transfer,anggota_setoran.id_petugas');
		$this->db->from('anggota_setoran');
		$this->db->join('anggota', 'anggota.id_anggota = anggota_setoran.id_anggota', 'left');
		$this->db->join('master_jenis_setoran', 'anggota_setoran.id_jenis_setoran = master_jenis_setoran.id', 'left');
		$this->db->where('anggota_setoran.id', $this->input->post('id'));
		$this->db->order_by('tgl_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getDetailCicil()
	{
		$this->db->select('cicil.id,cicil.jasa,cicil.jumlah_bayar,cicil.angsuran,cicil.tgl_tempo');
		$this->db->from('cicil');
		$this->db->where('id_angsuran', $this->uri->segment(3));
		$this->db->where('status', 2);
		$query = $this->db->get();
		return $query->row();
	}
	public function getCicil($id='')
	{
		if ($this->session->userdata('username') == null) {
			$this->db->select('anggota_pinjaman.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.biaya_jasa,anggota.nama,anggota_pinjaman.besar_pengajuan_pinjaman');
			$this->db->from('anggota_pinjaman');
			$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
			$this->db->where('anggota_pinjaman.id_anggota', $this->session->userdata('id_anggota'));
			$this->db->where('anggota_pinjaman.status_pinjaman !=', '4');
			$query = $this->db->get();
		}else{
			if ($id != '') {
				$this->db->select('cicil.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,cicil.status,cicil.angsuran,cicil.keterangan,cicil.jumlah_bayar,cicil.jasa,anggota.nama,cicil.bukti_tf,anggota_pinjaman.besar_pengajuan_pinjaman');
				$this->db->from('anggota_pinjaman');
				$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
				$this->db->join('cicil', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
				$this->db->where('cicil.status', '3');
				$this->db->where('cicil.id', $id);
				$this->db->group_by('cicil.id_angsuran');
				$query = $this->db->get();
			}else{
				$this->db->select('anggota_pinjaman.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,cicil.status,cicil.angsuran,cicil.keterangan,cicil.jumlah_bayar,cicil.jasa,anggota.nama,anggota_pinjaman.besar_pengajuan_pinjaman');
				$this->db->from('anggota_pinjaman');
				$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
				$this->db->join('cicil', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
				$this->db->where_in('cicil.status', [1,2]);
				$this->db->group_by('cicil.id_angsuran');
				$query = $this->db->get();
			}
		}
		return $query->result();

	}
	public function getCicilAdmin()
	{
		$this->db->select('cicil.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,cicil.status,cicil.angsuran,cicil.keterangan,cicil.jumlah_bayar,cicil.jasa,anggota.nama');
		$this->db->from('anggota_pinjaman');
		$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
		$this->db->join('cicil', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
		$this->db->where('cicil.status', 3);
		$this->db->group_by('cicil.id_angsuran');
		$query = $this->db->get();
		return $query->result();

	}
	public function getDetailPinjaman($id)
	{
		$this->db->select('anggota_pinjaman.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.biaya_jasa,anggota.nama,anggota_pinjaman.surat_pt,anggota_pinjaman.besar_pengajuan_pinjaman');
		$this->db->from('anggota_pinjaman');
		$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
		$this->db->where('anggota_pinjaman.id', $id);
		$this->db->where('anggota_pinjaman.status_pinjaman !=', '4');
		$query = $this->db->get();
		return $query->result();
	}
	public function register()
	{
		$cek = $this->db->get_where('anggota', array('nik'=>$this->input->post('no_ktp')));
		if ($cek->num_rows() > 0) {
			$val = array('success'=>false,'msg'=>'Data Sama');
		}else{
			$nama = $this->input->post('nama_lengkap');
			$tmp = $this->input->post('tempat_lahir');
			$tgl = $this->input->post('birth_date');
			$bln = $this->input->post('birth_month');
			$thn = $this->input->post('birth_year');
			$pekerja = $this->input->post('pekerjaan');
			$lain = $this->input->post('lainnya');
			if ($pekerja == 'lainnya') {
				$pekerjaan = $lain;
			}else {
				$pekerjaan = $pekerja;
			}
			$alamat = $this->input->post('alamat');
			$ktp = $this->input->post('no_ktp');
			$no_tlp = $this->input->post('no_rumah');
			$no_hp = $this->input->post('no_hp');

			$bayar = $this->input->post('pembayaran');

			if ($bayar == 1) {
				$status = '2';
			}else{
				$status = '3';
			}

			$methode = $this->input->post('metode_pem');
			$jml = $this->input->post('sebesar');
			$sukarela = $this->input->post('sim_sukarela');

			$gambarktp = $this->Uploadfoto('file_fotocopy');
			$gambarfoto = $this->Uploadfoto('foto_1');
			$gambarfoto2 = $this->Uploadfoto('foto_2');
			$gambartf = $this->Uploadfoto('foto_tf');

			$nokartu = $this->Uploadfoto('no_kartu');
			$norek = $this->Uploadfoto('no_rek');
			$namabank = $this->Uploadfoto('nama_bank');

			$tgl_lahir = date('Y-m-d',strtotime(date($thn.'-'.$bln.'-'.$tgl)));

			$this->db->select('MAX(no_anggota) as jml');
			$this->db->from('anggota');
			$max = $this->db->get()->row()->jml;
			$urut=substr($max,3,3)+1;
			$depan = substr($max, 0,3);
			$anggota= $depan.sprintf("%03s",$urut);
		// return var_dump($anggota);
			$query = $this->db->insert('anggota', array(
				'no_anggota'=>$anggota,
				'nama'=>$nama,
				'tempat_lahir'=>$tmp,
				'tgl_lahir'=>$tgl_lahir,
				'nik'=>$ktp,
				'alamat'=>$alamat,
				'no_hp'=>$no_hp,
				'status'=>'3',
				'created_date'=>date('Y-m-d H:i:s'),
				'pekerjaan'=>$pekerjaan,
				'no_kartu'=>$nokartu,
				'no_rek'=>$norek,
				'bank'=>$namabank,
				'password'=>password_hash('123456', PASSWORD_DEFAULT),
			));
			$id_anggota = $this->db->insert_id();
			if ($query == true) {
				$this->db->insert('syarat_foto', array(
					'id_anggota'=>$id_anggota,
					'f_ktp'=>$gambarktp,
					'f_foto'=>$gambarfoto,
					'f_foto2'=>$gambarfoto2,
					'created_at'=>date('Y-m-d H:i:s'),
				));
				$this->db->insert('anggota_setoran', array(
					'id_anggota'=>$id_anggota,
					'tipe_transaksi'=>'1',
					'id_jenis_setoran'=>'1',
					'jumlah_transaksi'=>$jml,
					'saldo_akhir'=>'0',
					'tgl_transaksi'=>date('Y-m-d'),
					'sistem_bayar'=>$bayar,
					'metode_bayar'=>$methode,
					'bukti_transfer'=>$gambartf,
					'status'=>'0',
				));
				$val = array('success'=>true,'msg'=>'Menunggu Konfirmasi dari Petugas');
			}else{
				$val = array('success'=>false,'msg'=>'gagal');
			}

		}
		echo json_encode($val);
	}
	public function tambahRek()
	{
		$rek = $this->input->post('norek');
		$sandi = $this->input->post('sandi');
		$ulang = $this->input->post('ulang_sandi');
		$cek = $this->db->get_where('anggota', array('no_rek'=>$rek))->num_rows();
		if ($cek > 0) {
			$val = array('success'=>false,'msg'=>'No Rekening Sudah Terdaftar');
		}else{
			if ($rek == '') {
				$val = array('success'=>false,'msg'=>'No Rekening Tidak Boleh Kosong');
			}else if ($sandi != $ulang) {
				$val = array('success'=>false,'msg'=>'Kata Sandi Tidak Sama');
			}else{
				$query = $this->db->update('anggota', array(
					'no_rek'=>$rek,
					'password'=>password_hash($sandi, PASSWORD_DEFAULT),
				),array('id_anggota'=>$this->session->userdata('id')
			));
				if ($query == true) {
					$val = array('success'=>true,'msg'=>'Berhasil Tambah Rekening');
				}else{
					$val = array('success'=>false,'msg'=>'Gagal Tambah Rekening dan Ganti Password');
				}
			}
		}
		echo json_encode($val);
		
	}
	public function getAnggotaBaru($id='')
	{
		if ($id != '') {
			$this->db->select('*');
			$this->db->from('anggota');
			$this->db->join('syarat_foto', 'anggota.id_anggota = syarat_foto.id_anggota', 'left');
			$this->db->join('master_kelompok', 'anggota.id_kelompok = master_kelompok.id', 'left');
			$this->db->where('anggota.id_anggota', $id);
			$query = $this->db->get();
		}else{
			$this->db->select('*');
			$this->db->from('anggota');
			$this->db->where_in('status', [2,3,4]);
			$query = $this->db->get();
		}
		return $query->result();
	}

	public function upbuktipinjam()
	{
		$buktitf = $this->Uploadfoto('filenya');
		$query = $this->db->update('anggota_pinjaman',array(
			'bukti_tf'=>$buktitf,
			'status_pinjaman'=>5,
		),array('id'=>$this->input->post('id')));
		if ($query == true) {
			$val = array('success'=>true,'msg'=>'Berhasil Upload Bukti');
		}else{
			$val = array('success'=>false,'msg'=>'Gagal Upload Bukti');
		}
		echo json_encode($val);
	}
	public function ActTerimaUser()
	{
		$cek = $this->db->get_where('anggota', array('id_anggota'=>$this->input->post('id')))->row();
		if ($cek->status == '2') {
			$status = 1;
		}else{
			$status = 4;
		}
		$query = $this->db->update('anggota',array(
			'status'=>$status,
			'tgl_masuk'=>date('Y-m-d'),
			'acc_by'=>$this->session->userdata('id'),
		),
		array('id_anggota'=>$this->input->post('id')
	));
		$this->db->update('anggota_setoran', array(
				'status'=>'1'),
			array('tipe_transaksi'=>'1','id_anggota'=>$this->input->post('id'),'id_jenis_setoran'=>'1'
		));
		if ($query == true) {
			$val = array('success'=>true,'msg'=>'Berhasil Terima Anggota');
		}else{
			$val = array('success'=>false,'msg'=>'Gagal Terima Anggota');
		}
		echo json_encode($val);
	}
	public function ActTolakUser()
	{
		$query = $this->db->update('anggota',array(
			'status'=>0,
		),
		array('id_anggota'=>$this->input->post('id')
	));
		if ($query == true) {
			$val = array('success'=>true,'msg'=>'Berhasil Tolak Anggota');
		}else{
			$val = array('success'=>false,'msg'=>'Gagal Tolak Anggota');
		}
		echo json_encode($val);
	}
	public function actUbahprofile()
	{
			$file = $this->Uploadfotoprofile('avatar');
		if ($this->session->userdata('username')==null) {
			$query = $this->db->update('anggota', array(
				'avatar'=>$file,
				'nama'=>$this->input->post('nama'),
				'tempat_lahir'=>$this->input->post('tempat_lahir'),
				'tgl_lahir'=>date('Y-m-d',strtotime($this->input->post('tgl_lahir'))),
				'alamat'=>$this->input->post('alamat'),
				'no_hp'=>$this->input->post('no_hp'),
				'no_rek'=>$this->input->post('no_rek'),
				'bank'=>$this->input->post('bank'),
			),array('id_anggota'=>$this->session->userdata('id')));
		}else{
			$query = $this->db->update('akun_user', array(
				'avatar'=>$file,
				'nama'=>$this->input->post('nama'),
				'username'=>$this->input->post('username'),
				'email'=>$this->input->post('email'),
				'no_hp'=>$this->input->post('no_hp'),
			),array('id'=>$this->session->userdata('id')));
		}
		if ($query == true) {
			$val = array('success'=>true,'msg'=>'Berhasil Ubah Data Diri Anda');
		}else{
			$val = array('success'=>false,'msg'=>'Gagal Ubah Data Diri Anda');
		}
		echo json_encode($val);
	}
	public function actUbahpassword()
	{
		$file = $this->Uploadfotoprofile('avatar');
		if ($this->session->userdata('username')==null) {
			$cek = $this->db->get_where('anggota',array('id_anggota'=>$this->session->userdata('id')))->row();
			$cekpassanggota = password_verify(''.$this->input->post('oldpassword').'', ''.$cek->password.'');
			if ($cekpassanggota == true) {
				if ($this->input->post('password') == $this->input->post('repassword')) {
					$query = $this->db->update('anggota', array(
						'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					),array('id_anggota'=>$this->session->userdata('id')));
				}else{
					$val = array('success'=>false,'msg'=>'Password Tidak Sama');
				}
			}else{
				$val = array('success'=>false,'msg'=>'Password Lama Tidak Sesuai');
			}
		}else{
			$cek = $this->db->get_where('akun_user',array('id'=>$this->session->userdata('id')))->row();
			$cekpassanggota = password_verify(''.$this->input->post('oldpassword').'', ''.$cek->password.'');
			if ($cekpassanggota == true) {
				if ($this->input->post('password') == $this->input->post('repassword')) {
					$query = $this->db->update('akun_user', array(
						'password'=>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					),array('id'=>$this->session->userdata('id')));
				}else{
					$val = array('success'=>false,'msg'=>'Password Tidak Sama');
				}
			}else{
				$val = array('success'=>false,'msg'=>'Password Lama Tidak Sesuai');
			}
		}
		if ($query == true) {
			$val = array('success'=>true,'msg'=>'Berhasil Ubah Password Anda');
		}else{
			$val = array('success'=>false,'msg'=>'Gagal Ubah Password Anda');
		}
		echo json_encode($val);
	}
	public function getReportHutang($id)
	{
			$this->db->select('SUM(jumlah_bayar + jasa) as nunggak');
			$this->db->from('cicil');
			$this->db->join('anggota_pinjaman', 'anggota_pinjaman.id = cicil.id_angsuran', 'left');
			$this->db->where('anggota_pinjaman.id_anggota', $id);
			$this->db->where_in('status', [2,3]);
			$query = $this->db->get();
			return $query->row()->nunggak;
		
	}
	public function getReportPinjaman($id)
	{
			$this->db->select('SUM(besar_persetujuan_pinjaman) as hitung');
			$this->db->from('anggota_pinjaman');
			$this->db->where('anggota_pinjaman.id_anggota', $id);
			$this->db->where_in('status_pinjaman', [2,3]);
			$query = $this->db->get();
			return $query->row()->hitung;
		
	}
	public function getReportjasa($id)
	{
		$this->db->select('SUM(biaya_jasa) as hitung');
			$this->db->from('anggota_pinjaman');
			$this->db->where('anggota_pinjaman.id_anggota', $id);
			$this->db->where_in('status_pinjaman', [2,3]);
			$query = $this->db->get();
			return $query->row()->hitung;
	}
	public function getReportUser()
	{
		if ($this->input->post('bulan') == null) {
			$bulan = date('Y-m');
		}else{
			$bulan = date('Y-m',strtotime($this->input->post('bulan')));
		}
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where("DATE_FORMAT(created_date,'%Y-%m')", $bulan);
		$this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}
	public function getSimpanan()
	{
		if ($this->input->post('bulansimpan') == null) {
			$bulan = date('Y-m');
		}else{
			$bulan = date('Y-m',strtotime($this->input->post('bulansimpan')));
		}
		$this->db->select('SUM(anggota_setoran.jumlah_transaksi) as total, anggota.nama, anggota_setoran.tgl_transaksi');
		$this->db->from('anggota');
		$this->db->join('anggota_setoran', 'anggota.id_anggota = anggota_setoran.id_anggota', 'INNER');
		$this->db->where("DATE_FORMAT(anggota_setoran.tgl_transaksi,'%Y-%m')", $bulan);
		$this->db->where('anggota_setoran.id_jenis_setoran !=',1);
		$this->db->group_by('anggota_setoran.id_anggota');
		$this->db->order_by('tgl_transaksi', 'desc');
		$query = $this->db->get();
		// return var_dump($this->db->last_query());
		return $query->result();
	}
	function getNamaPetugas($id)
	{
		$q = $this->db->get_where('anggota',array('id_anggota'=>$id));
		return $q->row();
	}
	public function Uploadfoto($param)
	{
		$this->load->library('upload');
		$config['upload_path'] = './assets/images/bukti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->upload->initialize($config);
		$upload = $this->upload->do_upload($param);
		$data = $this->upload->data();
		if (! $upload) {
			$image = null;
		}else{
			$image = $data['file_name'];
		}
		return $image;
	}
	public function Uploadfotoprofile($param)
	{
		$this->load->library('upload');
		$config['upload_path'] = './assets/img/profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->upload->initialize($config);
		$upload = $this->upload->do_upload($param);
		$data = $this->upload->data();
		if (! $upload) {
			$image = null;
		}else{
			$image = $data['file_name'];
		}
		return $image;
	}
}

/* End of file MMain.php */
/* Location: ./application/models/MMain.php */