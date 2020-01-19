<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MPinjam', 'ms');
		$this->load->model('MCicil', 'mc');
		$this->load->model('MMain', 'mm');
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
	public function successRespone($msg)
	{
		$respone = array(
			'success'=>true,
			'msg'=>$msg,
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
	public function failedFecthData($msg)
	{
		$respone = array(
			'success'=>false,
			'msg'=>$msg,
		);
		echo json_encode($respone);
	}
	public function TolakCicil()
    {
        // return var_dump($this->input->post('id'));
        $data['id'] = $this->input->post('id');
        $json = $this->load->view('pages/admin/modaltolakcicil',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
	public function InfoCicil()
    {
        // return var_dump($this->input->post('id'));
        $data['cicil'] = $this->mm->getCicil($this->input->post('id'));
        $json = $this->load->view('pages/admin/modalinfocicil',$data);
        $this->output->set_content_type('application/json');
        echo json_encode(array('html'=> $json));
    }
    public function TerimaCicil()
    {
    	$wheremc = array(
    		'tipe_cicil'=>1,
    		'id'=>$this->input->post('id')
    	);
    	$datamc = array(
    		'status'=>'4',
    	);
    	$queryms = $this->mc->update($datamc,$wheremc);
    	if ($queryms == true) {
    		$msg = "Berhasil";
    		$json = $this->successRespone($query);
    	}else{
    		$json = $this->failedRespone();
    	}
    }
    public function actTolakCicil()
    {
    	$wheremc = array(
    		'tipe_cicil'=>1,
    		'id'=>$this->input->post('id')
    	);
    	$datamc = array(
    		'status'=>'2',
    		'keterangan'=>$this->input->post('alasan'),
    	);
    	$queryms = $this->mc->update($datamc,$wheremc);
    	if ($queryms == true) {
    		$msg = "Berhasil";
    		$json = $this->successRespone($msg);
    	}else{
    		$json = $this->failedRespone();
    	}
    }
	public function BatalPinjam()
	{
		$mc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);
		$ms = array(
			'id'=>$this->input->post('id'));
		$querymc = $this->mc->delete($mc);
		if ($querymc == true) {
			$queryms = $this->ms->delete($ms);
			if ($queryms == true) {
				$msg = "Berhasil";
				$json = $this->successRespone($query);
			}else{
				$json = $this->failedRespone();
			}
		}else{
			$json = $this->failedRespone();
		}
	}
	public function LanjutkanPinjam()
	{
		$wheremc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datamc = array(
			'status'=>'1'
		);

		$datams = array(
			'status_pinjaman'=>'1'
		);

		$this->mc->update($datamc,$wheremc);
		$this->ms->update($datams,$wherems);

	}
	public function pinjamUang()
	{
		try {
			$bunga = $this->db->get_where('bunga',array('status'=>'1'))->row();
			$jasa = $bunga->bunga/100;
			$surat = $this->Uploadfoto('surat_pernyataan');
			$data = array(
				'id_anggota'=>$this->session->userdata('id'),
				'besar_pengajuan_pinjaman'=>$this->input->post('nominal'),
				'besar_persetujuan_pinjaman'=>$this->input->post('nominal'),
				'tgl_pengajuan_pinjaman'=>date('Y-m-d H:i:s'),
				'no_rek'=>$this->input->post('norek'),
				'no_hp'=>$this->input->post('telp'),
				'keperluan'=>$this->input->post('keperluan'),
				'status_pinjaman'=>'4',
				'biaya_jasa'=>round($this->input->post('nominal')*$jasa),
				'surat_pt' => $surat,
			);
			$query = $this->ms->insertid($data);
			$tanggal = date('Y-m').'-06';
			for ($i=0; $i < $this->input->post('jml_angsuran'); $i++) {
				$cicilan = array(
				'tipe_cicil'=>'1',
				'id_angsuran'=>$query,
				'angsuran'=>$i,
				'jumlah_bayar'=>round($this->input->post('nominal')/$this->input->post('jml_angsuran')),
				'jasa'=>round(($this->input->post('nominal')*$jasa)/($this->input->post('jml_angsuran'))),
				'tgl_tempo'=>date('Y-m'.'-6',strtotime('+'.($i + 1).' month')),
				'status'=>'0',
				'created_at'=>date('Y-m-d H:i:s')
			);
				$cicil = $this->mc->insert($cicilan);
			}
			$angsuran = $this->db->insert('anggota_pinjaman_angsuran', array(
				'id_pinjaman'=>$query,
				'jumlah_angsuran'=>$this->input->post('nominal'),
				'bayar_jasa'=>round(($this->input->post('nominal')*$jasa)/($this->input->post('jml_angsuran'))),
				'sisa_pinjaman'=>$this->input->post('nominal'),
				'status'=>0,
				));
			if ($query == true) {
				$json = $this->successRespone($query);
			}else{
				$json = $this->failedRespone();
			}
		} catch (Exception $e) {
			$json = $this->failedRespone();
		}
	}
	public function bayarPinjaman()
	{
		$wheremc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datamc = array(
			'status'=>'1'
		);

		$datams = array(
			'status_pinjaman'=>'1'
		);

		$this->mc->update($datamc,$wheremc);
		$query = $this->ms->update($datams,$wherems);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}
	}
	public function TerimaPinjaman()
	{
		$wheremc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datamc = array(
			'status'=>'2'
		);

		$datams = array(
			'status_pinjaman'=>'2',
			'id_petugas'=>$this->session->userdata('id'),
		);

		$this->mc->update($datamc,$wheremc);
		$this->ms->update($datams,$wherems);

	}
	public function TolakPinjaman()
	{
		$wheremc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datamc = array(
			'status'=>'4'
		);

		$datams = array(
			'status_pinjaman'=>'0'
		);

		$this->mc->update($datamc,$wheremc);
		$this->ms->update($datams,$wherems);
	}
	public function BuktiBayarPinjaman()
	{

		$gambar = $this->Uploadfoto('filenya');
		$wheremc = array(
			'tipe_cicil'=>1,
			'id'=>$this->input->post('id'),
			'angsuran'=>($this->input->post('angsuran')-1),
		);

		$datamc = array(
			'jenis_bayar'=>$this->input->post('jenis'),
			'bukti_tf'=>$gambar,
			'id_petugas'=>$this->input->post('idpetugas'),
			'status'=>2,
			// 'tgl_bayar'=>date('Y-m-d',strtotime($this->input->post('set-tanggal'))),
			'tgl_bayar'=>date('Y-m-d'),
		);

		$query = $this->mc->update($datamc,$wheremc);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}
	}
	public function AccPinjamanAdmin()
	{
		$wheremc = array(
			'tipe_cicil'=>1,
			'id_angsuran'=>$this->input->post('id')
		);

		$datamc = array(
			'status'=>'4'
		);

		$this->mc->update($datamc,$wheremc);
	}
	public function Uploadfoto($param)
	{
		$this->load->library('upload');
		$config['upload_path'] = './assets/images/bukti/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name']         = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->upload->initialize($config);
		$upload = $this->upload->do_upload($param);
		if (! $upload) {
			$image = null;
		}else{
			$data = $this->upload->data();
			$image = $data['file_name'];
		}
		return $image;
	}
}

/* End of file PinjamController.php */
/* Location: ./application/controllers/PinjamController.php */