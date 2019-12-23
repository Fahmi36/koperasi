<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Home - Selamat Datang di Koperasi Simpan Pinjam';
		$data['link_view'] = 'pages/home';
		$this->load->view('utama',$data);
	}
	public function page_not_found()
	{
		$data['title'] = "404 PAGE NOT FOUND";
		$this->load->view('not_found',$data);
	}
}