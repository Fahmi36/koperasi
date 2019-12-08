<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logincontroller extends CI_Controller {

	public function apilogin()
	{
		$user = $this->db->get('hp');
		$query = $this->db->get_where('anggota',array('no_anggota'=>$user));
		if ($query->num_rows() > 0) {
			$json = array('success'=>true,'id'=>$query->row()->no_anggota,'nama'=>$query->row()->nama);
		}else{
			$json = array('success'=>false)
		}
		echo json_encode($json);
	}

}

/* End of file Logincontroller.php */
/* Location: ./application/controllers/api/Logincontroller.php */