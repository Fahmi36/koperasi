<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	

	function __construct() {
		parent::__construct();
		$this->load->model('MMain', 'mm');
	}
	public function index()
	{
		$data['title'] = 'Home - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/home';
		$data['simpanan'] = $this->mm->getSimpananAnggota();
		$data['totalsimpan'] = $this->mm->getTotalSimpan();
		$data['totalprofit'] = $this->mm->getProfit();
		$data['belumbayar'] = $this->mm->getBelumbayar();
		$data['totalpengeluaran'] = $this->mm->getPengeluran();
		$data['totalpengeluaranpinjam'] = $this->mm->getPengeluranPinjaman();
		$this->load->view('utama',$data);
	}
	public function pinjaman()
	{
		$data['title'] = 'Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/pinjaman';
		$this->load->view('utama',$data);
	}
	public function setoran()
	{
		$data['title'] = 'Setoran - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/setoran';
		$this->load->view('utama',$data);
	}
	public function login()
	{
		$data['title'] = 'Masuk - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/user/login';
		$this->load->view('utama',$data);
	}
	public function register()
	{
		$data['title'] = 'Daftar - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/user/register';
		$this->load->view('utama',$data);
	}
	public function sim_pokok()
	{
		$data['title'] = 'Simpanan Poko - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/pokok';
		$data['jenis_setor'] = $this->mm->getMasterSetoran();
		$this->load->view('utama',$data);
	}
	public function sim_wajib()
	{
		$data['title'] = 'Simpanan Wajib - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/wajib';
		$this->load->view('utama',$data);
	}
	public function sim_suka()
	{
		$data['title'] = 'Simpanan Sukarela - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/sukarela';
		$this->load->view('utama',$data);
	}
	public function page_not_found()
	{
		$data['title'] = "404 PAGE NOT FOUND";
		$this->load->view('not_found',$data);
	}
	public function getPetugas()
	{
		$this->db->select('id_anggota,nama');
		$this->db->from('anggota');
		$this->db->where('id_kelompok', '3');
		$this->db->like('nama', $this->input->get('search'));
		$query = $this->db->get();
		$data = "";
        foreach ($query->result() as $value) {
            $data[] = array(
                'id' => $value->id_anggota,
                'text' => $value->nama, 
            );
        }
        // var_dump($this->db->last_query());
        echo json_encode($data);
	}
	public function actLogin()
	{
		
	}
}