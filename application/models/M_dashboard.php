<?php 
 
class M_dashboard extends CI_Model{	
	function cek_user($table,$where){		
		return $this->db->get_where($table,$where);
	}
	function total_penerimaan_dana(){
		return $this->db->query('SELECT SUM(pemasukan_dana) as jum
										FROM 4_buku_kas');		
	}
	function total_dana_terealisasi(){
		return $this->db->query('SELECT SUM(pengeluaran_dana) as jum
										FROM 4_buku_kas');		
	}
}