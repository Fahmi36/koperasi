<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamController extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('MPinjam', 'ms');
		$this->load->model('MCicil', 'mc');
		$this->load->model('MMain', 'mm');
		$this->load->model('MAngsuran', 'ma');
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
    		'status'=>'8',
    	);
    	$queryms = $this->mc->update($datamc,$wheremc);
    	if ($queryms == true) {
    		$cek = $this->db->get_where('cicil',array('angsuran'=>'9','status'=>'8','id'=>$this->input->post('id')));
    		if ($cek->num_rows() > 0) {
    			$row = $cek->row();
    			$where = array(
    				'id'=>$row->id_angsuran
    			);
    			$data = array(
    				'status_pinjaman'=>'3',
    			);
    			$query = $this->ms->update($data,$where);
    			if ($queryms == true) {
    				$msg = "Berhasil";
    				$json = $this->successRespone($query);
    			}else{
    				$json = $this->failedRespone();
    			}
    		}
    		$this->db->from('anggota_pinjaman_angsuran');
    		$this->db->where('id_pinjaman',$cek->row()->id_angsuran);
    		$this->db->order_by('tgl_angsuran', 'desc');
    		$ma = $this->db->get();
    		$cekrow = $this->db->get_where('cicil',array('status'=>'8','id'=>$this->input->post('id')))->row();
    		$datama = array(
    			'id_pinjaman'=>$cekrow->id_angsuran,
    			'jumlah_angsuran'=>$cekrow->jumlah_bayar,
    			'bayar_jasa'=>$cekrow->jasa,
    			'sisa_pinjaman'=>$ma->row()->sisa_pinjaman-($cekrow->jumlah_bayar+$cekrow->jasa),
    			'status'=>1,
    			'tgl_angsuran'=>date('Y-m-d'),
    		);
    		$queryma = $this->ma->insert($datama);
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
		$ma = array(
			'id_pinjaman'=>$this->input->post('id'));
		$querymc = $this->mc->delete($mc);
		if ($querymc == true) {
			$queryms = $this->ms->delete($ms);
			if ($queryms == true) {
				$queryma = $this->ma->delete($ma);
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

			$this->db->where_in('status_pinjaman',[0,1,2,3]);
			$this->db->where('id_anggota',$this->session->userdata('id'));
			$gagal = $this->db->get('anggota_pinjaman');
			if ($gagal->num_rows() > 0) {
				$msg = "Gagal Melakukan Pinjaman, Karena Masih ada Pinjaman";
				$json = $this->failedFecthData($msg);
			}else{
				$this->db->select('SUM(jumlah_transaksi) as simpan');
				$this->db->from('anggota_setoran');
				$this->db->where('tipe_transaksi',1);
				$this->db->where('status', 1);
				$this->db->where('id_anggota', $this->session->userdata('id'));
				$cek = $this->db->get();
				$row = $cek->row();
				if ($row->simpan*5 < $this->input->post('nominal')) {
					$msg = "Gagal Melakukan Pinjaman di Atas Rp.".strrev(implode('.',str_split(strrev(strval($row->simpan*5)),3)));
					$json = $this->failedFecthData($msg);
				}else{
					$bunga = $this->db->get_where('bunga',array('status'=>'1'))->row();
					$jasa = $bunga->bunga/100;
					$surat = $this->Uploadfoto('surat_pernyataan');
					$data = array(
						'id_anggota'=>$this->session->userdata('id'),
						'besar_pengajuan_pinjaman'=>$this->input->post('nominal'),
						'besar_persetujuan_pinjaman'=>'0',
						'tgl_pengajuan_pinjaman'=>date('Y-m-d H:i:s'),
						'no_rek'=>$this->input->post('norek'),
						'no_hp'=>$this->input->post('telp'),
						'kelompok'=>$this->input->post('kelompok'),
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
						'jumlah_angsuran'=>$this->input->post('nominal')+round(($this->input->post('nominal')*$jasa)/($this->input->post('jml_angsuran'))),
						'bayar_jasa'=>0,
						'sisa_pinjaman'=>round(($this->input->post('nominal')*$jasa)/($this->input->post('jml_angsuran'))),
						'tgl_angsuran' => $tanggal,
						'status'=>0,
					));
					if ($query == true) {
						$json = $this->successRespone($query);
					}else{
						$json = $this->failedRespone();
					}	
				}
			}
		} catch (Exception $e) {
			$json = $this->failedFecthData($e);
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
			'besar_persetujuan_pinjaman'=>$this->input->post('jumlah'),
			'id_petugas'=>$this->session->userdata('id'),
		);

		$this->mc->update($datamc,$wheremc);
		$query = $this->ms->update($datams,$wherems);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}

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
	public function KembalikanPinjaman()
	{
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datams = array(
			'status_pinjaman'=>'6',
			'keterangan'=>$this->input->post('keterangan'),
		);

		$query = $this->ms->update($datams,$wherems);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}
	}
	public function ubahPinjam()
	{
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$bunga = $this->db->get_where('bunga',array('status'=>'1'))->row();
		$jasa = $bunga->bunga/100;
		$surat = $this->Uploadfoto('surat_pernyataan_ulang');
		$datams = array(
			'status_pinjaman'=>'1',
			'besar_pengajuan_pinjaman'=>$this->input->post('nominal'),
			'besar_persetujuan_pinjaman'=>'0',
			'no_rek'=>$this->input->post('norek'),
			'no_hp'=>$this->input->post('telp'),
			'kelompok'=>$this->input->post('kelompok'),
			'keperluan'=>$this->input->post('keperluan'),	
			'biaya_jasa'=>round($this->input->post('nominal')*$jasa),
			'surat_pt' => $surat,
		);

		$query  = $this->ms->update($datams,$wherems);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}
	}
	public function VerifikasiPinjaman()
	{
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datams = array(
			'status_pinjaman'=>'7',
		);

		$query  = $this->ms->update($datams,$wherems);
		if ($query == true) {
			$json = $this->successRespone($query);
		}else{
			$json = $this->failedRespone();
		}
	}
	public function UlangPinjaman()
	{
		$wherems = array(
			'id'=>$this->input->post('id')
		);

		$datams = array(
			'status_pinjaman'=>'1',
			'besar_persetujuan_pinjaman' => '0',
		);

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
			'status'=>3,
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