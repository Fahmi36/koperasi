<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSimpan extends CI_Model {

	private $tbl = 'anggota_setoran';
	public $slt = '*';

	public function insert($array)
	{
		return $this->db->insert($this->tbl, $array);
	}
	public function update($array,$where)
	{
		return $this->db->update($this->tbl, $array,$where);
	}
	public function delete($where)
	{
		return $this->db->delete($this->tbl,$where);
	}
	public function select($where='',$kondisi='',$status='')
	{
		if ($kondisi == '') {
			$this->db->order_by('id', 'desc');
			$query = $this->db->get_where($this->tbl, $where);
		}else if($kondisi != ''){
			$this->db->$kondisi($status);
			$this->db->where($where);
			$this->db->order_by('id', 'desc');
			$query =  $this->db->get($this->tbl);
		}else{
			$this->db->order_by('id', 'desc');
			$query = $this->db->get($this->tbl);
		}
		return $query;	
	}
}

/* End of file MPokok.php */
/* Location: ./application/models/MPokok.php */