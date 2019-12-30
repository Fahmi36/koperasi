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

}

/* End of file MMain.php */
/* Location: ./application/models/MMain.php */