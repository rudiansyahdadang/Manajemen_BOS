<?php 
 
class M_pengguna extends CI_Model{
	function tampil_data(){
		return $this->db->get('pengguna');
	}

	function masukan_data($data,$table){
		$this->db->insert($table,$data);
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function perbaharui_data($where,$table){		
	return $this->db->get_where($table,$where);
	}
	function aksi_perbaharui($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}