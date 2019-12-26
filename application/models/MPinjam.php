<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPinjam extends CI_Model {

	private $tbl = 'pinjam';
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
	public function profitPinjam()
	{
		
	}
}

/* End of file MPinjam.php */
/* Location: ./application/models/MPinjam.php */