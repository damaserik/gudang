<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','form','file'));
		$this->load->model('M_nota');
	}
	// Tampilan Halaman Awal Shuttle 2
	public function index()
	{ 	
		$c['content'] = $this->load->view('nota/content');
		$this->load->view('gudang/dashboard',$c);
	}

	// nota
	// =====================================================================
	// tampilan data nota
	public function view_nota()
	{
		$data['isi'] = $this->M_nota->view_nota();
		$h = $this->load->view('gudang/dashboard', $data);
		$c['content'] = $this->load->view('gudang/nota/view', $h);
	}
	
	public function view_dtlnota($id='')
	{

		$data['isi'] = $this->M_nota->view_dtlnota($id);
		$h = $this->load->view('gudang/dashboard', $data);
		$c['content'] = $this->load->view('gudang/nota/view_dtlnota', $h);
	}
	// Form tambah nota
	public function tambah_nota()
	{
		$isi['kode'] = $this->M_nota->kode_nota();
		$h = $this->load->view('gudang/dashboard', $isi);
		$c['content'] = $this->load->view('gudang/nota/tambah', $h);
		$this->load->view('gudang/dashboard', $c);
	}

	// Fungsi Insert nota
	public function simpan_nt()
	{
		$cek = $this->db->query("SELECT * FROM nota_barang_keluar where nomor='".$this->input->post('nonota', TRUE)."' ")->num_rows();
		if($cek <= 0){
			$kd 			= $this->input->post('kd');
			$nomor 			= $this->input->post('nonota');
			$tujuan 		= $this->input->post('tujuan');
			$order_penj 	= $this->input->post('order_penj');
			$tgl_order 		= $this->input->post('tgl_order');
			$ket 			= $this->input->post('ket');
			$tgl_nota 		= $this->input->post('tgl_nota');
			$nama_brg	 	= $this->input->post('nama_brg');
			$sat1 			= $this->input->post('sat1');
			$sat2			= $this->input->post('sat2');

			$data1 = array(
				'id_nota'			=> $kd,
				'nomor' 			=> $nomor,
				'tujuan' 			=> $tujuan,
				'order_penj' 		=> $order_penj,
				'tgl_order' 		=> $tgl_order,
				'ket'		 		=> $ket,
				'tgl_nota' 			=> $tgl_nota
			);
			$sql1 = $this->M_nota->simpan_nota($data1);

			$data2 = array();
			$i = 0;
			if(is_array($nama_brg)){
				foreach ($nama_brg as $nama) {
					array_push($data2, array(
						'id_nota'		=> $kd,
						'nama_brg' 		=> $nama, 
						'sat1' 			=> $sat1[$i],
						'sat2' 			=> $sat2[$i]
					));
					$i++;
				}
			}
			$sql2 = $this->M_nota->simpan_dtlnota($data2);

			$allsql = array($sql1,$sql2);
			if($allsql){ // Jika sukses
				echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
			}else{ // Jika gagal
				echo "<script>alert('Data gagal disimpan');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
			}

		}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf No Nota Sudah Ada")';
			echo '</script>';
			echo '<script language="javascript">';
			echo 'window.location=("'.site_url('gudang/nota/view_nota').'")';
			echo '</script>';
		}
	}


	// Fungsi Delete nota
	public function nota_hapus($id)
	{
		// $sql = $this->M_nota->delete_nota($id);
		// // $sql2 = $this->M_nota->delete_dtlnota($id);
		// // $allsql = array($sql,$sql2);
		// $allsql = array($sql);
		// if($allsql){ // Jika sukses
		// 	echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
		// }else{ // Jika gagal
		// 	echo "<script>alert('Data gagal di hapus');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
		// }
		$data1 = array( 'status' => '1'
			);
		$this->M_nota->delete_nota($id,$data1);
		$data2 = array( 'status' => '1'
			);
		$this->M_nota->delete_dtlnota($id,$data2);
		redirect('gudang/nota/view_nota', 'refresh');
	}
	public function dtl_nota_hapus($id)
	{
		// $sql = $this->M_nota->delete_dtlnota($id);
		// $allsql = array($sql);
		// if($allsql){ // Jika sukses
		// 	echo "<script>alert('Data berhasil di hapus');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
		// }else{ // Jika gagal
		// 	echo "<script>alert('Data gagal di hapus');window.location = '".site_url('gudang/nota/view_nota')."';</script>";
		// }
		$data2 = array( 'status' => '1'
			);
		$this->M_nota->delete_dtlnota2($id,$data2);
		redirect('gudang/nota/view_nota', 'refresh');
	}
	// fungsi form edit data nota
	public function edit_nota($id='')
	{	
		$data['ubah_data'] = $this->M_nota->view_edit_nota($id);		
		$c['content'] = $this->load->view('gudang/nota/edit', $data);
		$this->load->view('gudang/dashboard', $c);
	}
	// fungsi ubah nota
	public function nota_edit($id)
	{
		$data = array(	'id_nota' => $this->input->post('id_nota'),
			'nomor' => $this->input->post('nomor'),
			'tujuan' => $this->input->post('tujuan'),
			'order_penj' => $this->input->post('order_penj'),
			'tgl_order' => $this->input->post('tgl_order'),
			'ket' => $this->input->post('ket'),
			'tgl_nota' => $this->input->post('tgl_nota')
			);
		$this->M_nota->edit_nota($id,$data);
		redirect('gudang/nota/view_nota', 'refresh');
	}

	// fungsi form edit detail nota
	public function edit_notadtl($id='')
	{	
		$data['ubah_data'] = $this->M_nota->view_edit_dtlnota($id);		
		$c['content'] = $this->load->view('gudang/nota/edit_dtlnota', $data);
		$this->load->view('gudang/dashboard', $c);
	}
	// fungsi ubah detail nota
	public function dtlnota_edit($id)
	{
		$ids = $this->input->post('id_nota');
		$data = array(	'id_dtl' => $this->input->post('id_dtl'),
			'nama_brg' => $this->input->post('nama_brg'),
			'sat1' => $this->input->post('sat1'),
			'sat2' => $this->input->post('sat2')
			);
		$this->M_nota->edit_dtlnota($id,$data);
		redirect('gudang/nota/view_dtlnota/'.$ids, 'refresh');
	}

//////////////////////////RESTORE////////////////////////////////
// fungsi tampil data restore
	public function view_res_nota()
	{
		$data['isi'] = $this->M_nota->view_res_nota();
		$h = $this->load->view('gudang/dashboard', $data);
		$c['content'] = $this->load->view('gudang/nota/view_restore_nota', $h);
	}
	
	public function view_res_dtlnota($id='')
	{

		$data['isi'] = $this->M_nota->view_res_dtlnota($id);
		$h = $this->load->view('gudang/dashboard', $data);
		$c['content'] = $this->load->view('gudang/nota/view_restore_dtlnota', $h);
	}

// fungsi restore
	public function res_nota($id)
	{
		$data1 = array( 'status' => '0'
			);
		$this->M_nota->res_nota($id,$data1);
		$data2 = array( 'status' => '0'
			);
		$this->M_nota->res_dtlnota($id,$data2);
		redirect('gudang/nota/view_res_nota', 'refresh');
	}
	public function res_dtl_nota($id)
	{
		$data2 = array( 'status' => '0'
			);
		$this->M_nota->res_dtlnota2($id,$data2);
		redirect('gudang/nota/view_res_dtlnota', 'refresh');
	}
////////////////////////END RESTORE//////////////////////////////
}
