 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan_nota extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function header_nota($id)
	{
		$query = $this->db->query("SELECT * from nota_barang_keluar
				where id_nota='$id'");
		return $query->result();	
	}

	public function detail_nota($id)
	{
		$query = $this->db->query("SELECT b.id_dtl,a.id_nota,nomor,tujuan,order_penj,tgl_order,nama_brg,sat1,sat2,ket,tgl_nota
				FROM nota_barang_keluar AS a
				JOIN dtl_nota AS b ON a.id_nota=b.id_nota
				where a.id_nota='$id'");
		return $query->result();	
	}
}