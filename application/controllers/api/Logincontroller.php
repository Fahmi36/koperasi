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
	public function apilogin()
	{
		$user = $this->input->get('id_kop');
		$query = $this->db->get_where('anggota',array('no_anggota'=>$user));
		if ($query->num_rows() > 0) {
			$json = array('success'=>true,'id'=>$query->row()->no_anggota,'nama'=>$query->row()->nama);
		}else{
			$json = array('success'=>false);
		}
		echo json_encode($json);
	}

}

/* End of file Logincontroller.php */
/* Location: ./application/controllers/api/Logincontroller.php */