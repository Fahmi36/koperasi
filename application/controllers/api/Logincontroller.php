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
}

/* End of file Logincontroller.php */
/* Location: ./application/controllers/api/Logincontroller.php */