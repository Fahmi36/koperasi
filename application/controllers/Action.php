<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	

	function __construct() {
		parent::__construct();
		$this->load->model('MMain', 'mm');
	}
	public function index()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
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
	}
	public function pinjaman()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/pinjaman';
			$data['kelompok'] = $this->mm->getKelompok();
			$this->load->view('utama',$data);
		}
	}
	public function setoran()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Setoran - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/setoran';
			$this->load->view('utama',$data);
		}
	}
	public function bayarpinjam()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else if ($this->uri->segment(3) == null) {
			redirect('/');
		}else{
			$data['title'] = 'Bayar Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
			$data['cicil'] = $this->mm->getDetailCicil();
			$data['link_view'] = 'pages/bayarpinjam';
			if ($data['cicil']!=null) {
				$this->load->view('utama',$data);
			}else{
				redirect('/');
			}
		}
	}
	public function login()
	{
		if ($this->session->userdata('id')!=null) {
			redirect('/');
		}else{
			$data['title'] = 'Masuk - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/user/login';
			$this->load->view('utama',$data);
		}
	}
	public function register()
	{
		if ($this->session->userdata('id')!=null) {
			redirect('/');
		}else{
			$data['title'] = 'Daftar - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/user/register';
			$this->load->view('utama',$data);
		}
	}
	public function profile()
	{
		
			$data['title'] = 'Profile - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/user/profile';
			$this->load->view('utama',$data);
	}
	public function sim_pokok()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Simpanan Pokok - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/pokok';
			$data['jenis_setor'] = $this->mm->getMasterSetoran();
			$this->load->view('utama',$data);
		}
	}
	public function dataPinjam()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Data Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/datapinjaman';
			$data['cicilan'] = $this->mm->getCicil();
			$this->load->view('utama',$data);
		}
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
		try {
			$this->mm->login();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function ModalPinjam()
    {
        // return var_dump($this->input->post('id'));
        $data['angsuran'] = $this->mm->getAngsuran($this->input->post('id'));
        $json = $this->load->view('pages/modalpinjam',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function InfoSimpan()
    {
        // return var_dump($this->input->post('id'));
        $data['simpan'] = $this->mm->getDetailSimpanan($this->input->post('id'));
        $json = $this->load->view('pages/modalsimpan',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
     public function InfoPinjaman()
    {
        // return var_dump($this->input->post('id'));
        $data['pinjam'] = $this->mm->getDetailPinjaman($this->input->post('id'));
        $json = $this->load->view('pages/modalpinjaman',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function logout()
    { 
    	$this->session->unset_userdata('id');
    	$this->session->unset_userdata('nohp');
    	$this->session->unset_userdata('username');
    	$this->session->unset_userdata('nama');
    	$this->session->unset_userdata('level');
    	$this->session->unset_userdata('kelompok');
    	redirect('login');
    }
}