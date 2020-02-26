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
			$data['simpananwajib'] = $this->mm->getSimpananWajib();
			$data['totalprofit'] = $this->mm->getProfit();
			$data['belumbayar'] = $this->mm->getBelumbayar();
			$data['totalpengeluaran'] = $this->mm->getPengeluran();
			$data['totalpengeluaranpinjam'] = $this->mm->getPengeluranPinjaman();
			$data['tgltempo'] = $this->mm->getJatuhTempo();
			$data['user'] = $this->mm->getUser();
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
			$data['namakelompok'] = $this->mm->getNamaKelompok();
			$this->load->view('utama',$data);
		}
	}
	public function ulangpinjaman()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/kirimulang';
			$data['kelompok'] = $this->mm->getKelompok();
			$data['namakelompok'] = $this->mm->getNamaKelompok();
			$data['data'] = $this->mm->getDataPinjaman($this->uri->segment(3));
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
	public function newuser()
	{
		// if ($this->session->userdata('id')==null) {
		// 	redirect('login');
		// }else if ($this->session->userdata('username') == null) {
		// 	redirect('/');
		// }else{
			$data['title'] = 'Data User - Selamat Datang di Koperasi Simpan Pinjam';
			$data['anggota'] = $this->mm->getAnggotaBaru();
			$data['link_view'] = 'pages/admin/new_user';
			$this->load->view('utama',$data);		
		// }
	}
	public function datasimpan()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else if ($this->session->userdata('username') == null) {
			redirect('/');
		}else{
			$data['title'] = 'Data Simpan - Selamat Datang di Koperasi Simpan Pinjam';
			$data['simpanan'] = $this->mm->getSimpananBelumVerif();
			$data['link_view'] = 'pages/admin/bayar_simpan';
			$this->load->view('utama',$data);
		}
	}
	public function datapinjamadmin()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else if ($this->session->userdata('username') == null) {
			redirect('/');
		}else{
			$data['title'] = 'Data Pinjaman - Selamat Datang di Koperasi Simpan Pinjam';
			$data['cicilan'] = $this->mm->getCicilAdmin();
			$data['link_view'] = 'pages/admin/bayar_pinjam';
			$this->load->view('utama',$data);
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
			$data['kec'] = $this->mm->getKecamatan();
			$data['wal'] = $this->mm->getWal();
			$this->load->view('utama',$data);
		}
	}

	public function jsonWal()
	{
		echo "<option value='' >-- SILAHKAN PILIH KECAMATAN --</option>";
		echo "<option value=''  disabled></option>";
		$x = $this->mm->jsonWal();
		foreach ($x as $v) {
			echo '<option value='.$v->id.'>'.$v->name.'</option>';
		}
	}

	public function jsonKec()
	{
		echo "<option value=''>-- SILAHKAN PILIH KELURAHAN --</option>";
		echo "<option value='' disabled></option>";
		$x = $this->mm->jsonKec();
		foreach ($x as $v) {
			echo '<option value='.$v->id.'>'.$v->name.'</option>';
		}
	}

	public function profile()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Profile - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/user/profile';
			$data['profile'] = $this->mm->getProfile();
			$this->load->view('utama',$data);
		}
	}
	public function setting()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}elseif($this->session->userdata('username') == null){
			redirect('/');
		}else{
			$data['title'] = 'Profile - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/user/setting';
			$data['profile'] = $this->mm->getProfile();
			$this->load->view('utama',$data);
		}
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
	public function cetak_sim()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			
			$this->load->model('MMain', 'mm');
			$data['title'] = 'Cetak Simpanan - Selamat Datang di Koperasi Simpan Pinjam';
			$data['simpan'] = $this->mm->getPrintSimpanan($this->uri->segment(2));
			$this->load->view('pages/cetak_simpanan',$data);
		}
	}
	public function data_user()
	{
		if ($this->session->userdata('id')==null) {
			redirect('login');
		}else{
			$data['title'] = 'Data Pendaftar Baru - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/admin/new_user';
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
	public function report()
	{
		if ($this->session->userdata('username')==null) {
			redirect('/');
		}else{

			$this->load->model('MMain', 'mm');
			$data['title'] = 'Report Data - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/admin/report';
			// $data['rekap'] = $this->mm->getReport();
			$data['anggota'] = $this->mm->getAnggota();
			$this->load->view('utama',$data);
		}
	}

	public function page_not_found()
	{
		$data['title'] = "404 PAGE NOT FOUND";
		$this->load->view('not_found',$data);
	}
	public function reportUser()
	{
		if ($this->session->userdata('username')==null) {
			redirect('/');
		}else{

			$this->load->model('MMain', 'mm');
			$data['title'] = 'Report Data - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/admin/reportuser';
			$data['rekap'] = $this->mm->getReportUser();
			$this->load->view('utama',$data);
		}
	}
	public function actReportuser()
	{
		try {
			$data['rekap'] = $this->mm->getReportUser();
			echo json_encode($data);
		} catch (Exception $e) {
			echo json_encode(array($e));
		}
	}
	public function reportSimpan()
	{
		if ($this->session->userdata('username')==null) {
			redirect('/');
		}else{
			$this->load->model('MMain', 'mm');
			$data['title'] = 'Report Data - Selamat Datang di Koperasi Simpan Pinjam';
			$data['link_view'] = 'pages/admin/resportsimpan';
			$data['rekap'] = $this->mm->getSimpanan();
			$this->load->view('utama',$data);
		}
	}
	public function actReportSimpan()
	{
		try {
			$data['rekap'] = $this->mm->getSimpanan();
			echo json_encode($data);
		} catch (Exception $e) {
			echo json_encode(array($e));
		}
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
	public function actRegis()
	{
		try {
			$this->mm->register();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function actTfPinjam()
	{
		try {
			$this->mm->upbuktipinjam();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function TerimaUser()
	{
		try {
			$this->mm->ActTerimaUser();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function TolakUser()
	{
		try {
			$this->mm->ActTolakUser();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function Ubahprofile()
	{
		try {
			$this->mm->actUbahprofile();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function UbahPassword()
	{
		try {
			$this->mm->actUbahpassword();
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function Rekap()
	{
		try {
			$cek = $this->mm->getAnggota();
			foreach ($cek as $key) {
				$data['hutang'] = $this->mm->getReportHutang($key->id_anggota);
				$data['cicil'] = $this->mm->getReportCicil($key->id_anggota);

			echo json_encode($data);
			}
		} catch (Exception $e) {
			echo json_encode(array('success'=>false,'msg'=>$e));
		}
	}
	public function InfoUser()
    {
        // return var_dump($this->input->post('id'));
        $data['user'] = $this->mm->getAnggotaBaru($this->input->post('id'));
        $json = $this->load->view('pages/admin/modalinfouser',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
	public function ModalPinjam()
    {
        // return var_dump($this->input->post('id'));
        $data['angsuran'] = $this->mm->getAngsuran($this->input->post('id'));
        $json = $this->load->view('pages/modalpinjam',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function UploadBuktiTansfer()
    {
        // return var_dump($this->input->post('id'));
        $data['id'] = $this->input->post('id');
        $json = $this->load->view('pages/admin/modaltfpinjam',$data);
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
    public function VerifPinjaman()
    {
        // return var_dump($this->input->post('id'));
        $data['pinjam'] = $this->mm->getDetailPinjaman($this->input->post('id'));
        $json = $this->load->view('pages/admin/modalverifpinjam',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function PersetujuanPinjaman()
    {
        // return var_dump($this->input->post('id'));
        $data['pinjam'] = $this->mm->getDetailPinjaman($this->input->post('id'));
        $data['id'] = $this->input->post('id');
        $json = $this->load->view('pages/admin/modalpersetujuanpinjaman',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function KembalikanPinjaman()
    {
        // return var_dump($this->input->post('id'));
        $data['id'] = $this->input->post('id');
        $json = $this->load->view('pages/admin/modalkembalipinjaman',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function tambahRek()
    {
    	try {
    		$this->mm->tambahRek();
    	} catch (Exception $e) {
    		redirect('/');
    	}
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