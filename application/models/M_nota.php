<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_nota extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();		
	}
	// ============================= MENU MASTER ===============================
	// VIEW 
	// =========================================================================
	// nota
	public function view_nota()
	{
		$sql = "SELECT * FROM nota_barang_keluar where nota_barang_keluar.status='0' order by nomor asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function view_dtlnota($id)
	{
		$sql = "SELECT b.id_dtl,a.id_nota,nomor,tujuan,order_penj,tgl_order,nama_brg,sat1,sat2,ket,tgl_nota
				FROM nota_barang_keluar AS a
				JOIN dtl_nota AS b ON a.id_nota=b.id_nota
				where a.id_nota='$id' and b.status='0'
				order by nomor asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	function kode_nota()
		{
	 		$CI =& get_instance();
			$CI->load->database('default');
			//rancangan kode GL
			$kode_NT="NT".date('ym')."%";
			$sql="SELECT SUBSTRING(MAX(id_nota),7,4) AS maxNo FROM nota_barang_keluar where id_nota like('$kode_NT')";
			$row = $CI->db->query($sql);
			foreach ($row->result_array() as $rowmax)
			{	
			}
			//buat noPO baru dengan noPO terbesar+1
			$noNT_tmp		=$rowmax['maxNo'];
			$noNT			=$noNT_tmp+1;	
			$kode_tanggal	=date("ym");
			if(strlen($noNT)==1){
				$kode_nota="NT".$kode_tanggal."000".$noNT;
			}elseif(strlen($noNT)==2){
				$kode_nota="NT".$kode_tanggal."00".$noNT;
			}elseif(strlen($noNT)==3){
				$kode_nota="NT".$kode_tanggal."0".$noNT;
			}elseif(strlen($noNT)==4){
				$kode_nota="NT".$kode_tanggal.$noNT;
			}
			
			return $kode_nota;
		}

	public function simpan_nota($data)
	{
		$this->db->insert('nota_barang_keluar', $data);
	}
	
	public function simpan_dtlnota($data)
	{
		$this->db->insert_batch('dtl_nota', $data);
	}

	function delete_nota($id,$data)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('nota_barang_keluar', $data);
	}
	function delete_dtlnota($id,$data)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('dtl_nota', $data);
	}
	function delete_dtlnota2($id,$data)
	{
		$this->db->where('id_dtl', $id);
		$this->db->update('dtl_nota', $data);
	}
	public function view_edit_nota($id)
	{
		$this->db->select('*');
		$this->db->from('nota_barang_keluar');
		$this->db->where('id_nota', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_nota($id, $data)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('nota_barang_keluar', $data);
	}

	public function view_edit_dtlnota($id)
	{
		$this->db->select('*');
		$this->db->from('dtl_nota');
		$this->db->where('id_dtl', $id);
		$hasil = $this->db->get();
		if($hasil->num_rows()>0){
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function edit_dtlnota($id, $data)
	{
		$this->db->where('id_dtl', $id);
		$this->db->update('dtl_nota', $data);
	}

//////////////////////////RESTORE////////////////////////////////
// fungsi tampil data restore
	public function view_res_nota()
	{
		$sql = "SELECT * FROM nota_barang_keluar where nota_barang_keluar.status='1' order by nomor asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
	
	public function view_res_dtlnota()
	{
		$sql = "SELECT b.id_dtl,a.id_nota,a.nomor,a.tujuan,a.order_penj,a.tgl_order,b.nama_brg,b.sat1,b.sat2,a.ket,a.tgl_nota
				FROM nota_barang_keluar AS a
				JOIN dtl_nota AS b ON a.id_nota=b.id_nota
				where b.status='1'
				order by nomor asc";
		$data = $this->db->query($sql);
		return $data->result();
	}
// fungsi restore		
	function res_nota($id,$data)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('nota_barang_keluar', $data);
	}
	function res_dtlnota($id,$data)
	{
		$this->db->where('id_nota', $id);
		$this->db->update('dtl_nota', $data);
	}
	function res_dtlnota2($id,$data)
	{
		$this->db->where('id_dtl', $id);
		$this->db->update('dtl_nota', $data);
	}
	
////////////////////////END RESTORE//////////////////////////////
}