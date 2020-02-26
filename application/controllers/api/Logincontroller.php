<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin:*');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

class Logincontroller extends CI_Controller {
function __construct() {
        parent::__construct();
        header('Access-Control-Allow-Origin:*');
        header("Access-Control-Allow-Credentials: true");
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        

		$this->load->model('MCicil', 'mc');
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
	public function failedRespone()
	{
		$respone = array(
			'success'=>false,
			'msg'=>'Gagal',
		);
		echo json_encode($respone);
	}
	public function apilogin()
	{
		$user = $this->input->get('id_kop');
		$this->db->select('no_anggota,nama');
		$this->db->from('anggota');
		$query = $this->db->get_where('anggota',array('no_anggota'=>$user,'status'=>'1'));
		if ($query->num_rows() > 0) {
			$q = $this->resultRespone($query);
		}else{
			$q = $this->failedRespone();
		}
	}
	public function Cronjob()
	{
		$this->load->library('nexmo');
        $this->nexmo->set_format('json');
        $cicil = $this->db->get_where('cicil',array('status'=>'2'))->row();
		$this->db->select('anggota_pinjam.no_hp,anggota.nama');
		$this->db->from('cicil');
		$this->db->join('anggota_pinjam', 'cicil.id_angsuram = anggota_pinjam.id', 'left');
		$this->db->join('anggota', 'anggota_pinjam.id_anggota = anggota.id_anggota', 'left');
		$this->db->where('cicil.tgl_tempo >', date('Y-m-d',strtotime('+2 day',strtotime($cicil->tgl_tempo))));
		$this->db->where('cicil.status','2');
		$query = $this->db->get();
		$array = $query->result();

		foreach ($array as $key) {
			$from = 'PKK MELATI JAYA';
			$to = $key->no_hp;
			$message = array(
				'text' => 'Hallo '.$key->nama.'Silakan Melakukan Pembayaran Pinjaman Anda yang Sudah Jatuh Tempo',
			);
			$response = $this->nexmo->send_message($from, $to, $message);
			if ($this->nexmo->get_http_status() == '0') {
				echo "Berhasil".$key->no_hp;
			}else{
				echo "Gagal".$key->no_hp;
			}
		}
	}
	public function UpdateCicilan($value='')
	{
		$this->db->where_not_in('status_pinjaman', ['3']);
		$this->db->group_by('id_anggota');
		$query = $this->db->get('anggota_pinjaman');
		$row = $query->row();

		$cek = $this->db->get_where('anggota_pinjaman_angsuran',array('id_pinjaman'=>$row->id));
		if ($cek->num_rows() == 0) {
			$queryinsert = $this->db->insert('anggota_pinjaman_angsuran', array(
				'id_pinjaman'=>$row->id,
				'jumlah_angsuran'=>$row->besar_persetujuan_pinjaman,
				'bayar_jasa'=>$row->besar_persetujuan_pinjaman*10/100,
				'sisa_pinjaman'=>$row->besar_persetujuan_pinjaman,
				'status'=>'1'
				));
			$idangsuran = $this->db->insert_id();
			if ($queryinsert == true) {
				for ($i=0; $i < 10; $i++) {
					$cicilan = array(
						'tipe_cicil'=>'1',
						'id_angsuran'=>$queryinsert,
						'angsuran'=>$i,
						'jumlah_bayar'=>round($row->besar_persetujuan_pinjaman/10),
						'jasa'=>round(($row->besar_persetujuan_pinjaman*$jasa)/(10)),
						'tgl_tempo'=>date('Y-m'.'-6',strtotime('+'.($i + 1).' month')),
						'status'=>'0',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$cicil = $this->mc->insert($cicilan);
			}
		}else{
				$q = $this->failedRespone();
			}
		}else{
			for ($i=0; $i < 10; $i++) {
					$cicilan = array(
						'tipe_cicil'=>'1',
						'id_angsuran'=>$queryinsert,
						'angsuran'=>$i,
						'jumlah_bayar'=>round($row->besar_persetujuan_pinjaman/10),
						'jasa'=>round(($row->besar_persetujuan_pinjaman*$jasa)/(10)),
						'tgl_tempo'=>date('Y-m'.'-6',strtotime('+'.($i + 1).' month')),
						'status'=>'0',
						'created_at'=>date('Y-m-d H:i:s')
					);
					$cicil = $this->mc->insert($cicilan);
			}
		}
		
	}
}

/* End of file Logincontroller.php */
/* Location: ./application/controllers/api/Logincontroller.php */