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
}

/* End of file Logincontroller.php */
/* Location: ./application/controllers/api/Logincontroller.php */