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
		$this->db->where('status_pinjaman !=',0);
		$this->db->or_where('status_pinjaman !=',1);
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
			$this->db->where('anggota.no_anggota', $this->session->userdata('id'));
			$this->db->order_by('tgl_transaksi', 'desc');
			$query = $this->db->get();
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
				$session1 = array('id'=> $row->no_anggota,'nohp'=>$row->no_hp,'username' => null,'nama' => $row->nama,'level'=>'anggota','kelompok'=>$row->id_kelompok);
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
		$this->db->select('cicil.jasa,cicil.jumlah_bayar,cicil.angsuran,cicil.tgl_tempo');
		$this->db->from('cicil');
		$this->db->where('id_angsuran', $this->uri->segment(3));
		$this->db->where('status', 2);
		$this->db->or_where('id_petugas', 0);
		$this->db->or_where('bukti_tf', null);
		$query = $this->db->get();
		return $query->row();
	}
	public function getCicil()
	{
		$this->db->select('anggota_pinjaman.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.biaya_jasa,anggota.nama');
		$this->db->from('anggota_pinjaman');
		$this->db->join('anggota', 'anggota_pinjaman.id_anggota = anggota.id_anggota', 'left');
		$this->db->where('anggota_pinjaman.id_anggota', $this->session->userdata('id'));
		$this->db->where('anggota_pinjaman.status_pinjaman !=', '4');
		$query = $this->db->get();
		return $query->result();

	}
	public function getDetailPinjaman($id)
	{
		$this->db->select('anggota_pinjaman.id,anggota_pinjaman.no_hp,anggota_pinjaman.tgl_pengajuan_pinjaman,anggota_pinjaman.besar_persetujuan_pinjaman,anggota_pinjaman.keperluan,anggota_pinjaman.status_pinjaman,anggota_pinjaman.biaya_jasa,anggota.nama');
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

			$rpeng = $this->input->post('radiopengrptra');
			$peng = $this->input->post('pengelola');
			$rpkk = $this->input->post('radiotpngpkk');
			$pkk = $this->input->post('tim_penggerak');
			$rlain = $this->input->post('radiolainnya');
			$lain = $this->input->post('lainnya');
			if ($peng!= null) {
				$pekerjaan = $rpeng;
				$tempatnya = $peng;
			}else if ($pkk!= null) {
				$pekerjaan = $rpkk;
				$tempatnya = $pkk;
			}else if ($lain!= null) {
				$pekerjaan = $rlain;
				$tempatnya = $lain;
			}
			$alamat = $this->input->post('alamat');
			$ktp = $this->input->post('no_ktp');
			$no_tlp = $this->input->post('no_rumah');
			$no_hp = $this->input->post('no_hp');

			$bayar = $this->input->post('pembayaran');

			if ($bayar == 1) {
				$status = '1';
			}else{
				$status = '2';
			}

			$methode = $this->input->post('metode_pem');
			$jml = $this->input->post('sebesar');
			$f_ktp = $this->input->post('file_fotocopy');
			$f_warna = $this->input->post('foto_1');
			$f_warna2 = $this->input->post('foto_2');
			$buktitf = $this->input->post('foto_tf');
			$sukarela = $this->input->post('sim_sukarela');

			$gambarktp = $this->Uploadfoto($f_ktp);
			$gambarfoto = $this->Uploadfoto($f_warna);
			$gambarfoto2 = $this->Uploadfoto($f_warna2);
			$gambartf = $this->Uploadfoto($buktitf);
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
				'pekerjaan'=>$pekerjaan.','.$tempatnya,
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
					'status'=>'Pending',
				));
				$val = array('success'=>true,'msg'=>'Menunggu Konfirmasi dari Petugas');
			}else{
				$val = array('success'=>false,'msg'=>'gagal');
			}

		}
		echo json_encode($val);
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
}

/* End of file MMain.php */
/* Location: ./application/models/MMain.php */