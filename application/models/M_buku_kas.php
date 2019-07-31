<?php 
 
class M_buku_kas extends CI_Model{
	function tampil_data_4_buku_kas(){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*,
										1_tahun_anggaran.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_uraian_pengeluaran(){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_ur,
	 									2_uraian.id_tahun as id_th,
	 									2_uraian.kode_uraian as kode_ur,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian 
										join 3_sumber_dana on 3_sumber_dana.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 1_tahun_anggaran.id_tahun = 2_uraian.id_tahun
										where 1_tahun_anggaran.status AND 3_sumber_dana.jumlah !="0" && 2_uraian.id_uraian between "10" and "166" ');
	}
	function tampil_data_uraian_pemasukan(){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_ur,
	 									2_uraian.id_tahun as id_th,
	 									2_uraian.kode_uraian as kode_ur,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian 
										join 3_sumber_dana on 3_sumber_dana.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 1_tahun_anggaran.id_tahun = 2_uraian.id_tahun
										where 1_tahun_anggaran.status AND 3_sumber_dana.jumlah !="0" && 2_uraian.id_uraian between "4" and "9" ');
	}
	function tampil_data_tahun_anggaran(){
		return $this->db->get('1_tahun_anggaran');
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
	function tampil_data_perbaharui_pemasukan_4_buku_kas($id_buku_kas){

		return $this->db->query('SELECT 4_buku_kas.*,
										4_buku_kas.uraian as 4_uraian,
										2_uraian.*, 
										1_tahun_anggaran.* 
										from 4_buku_kas 
										INNER join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian 
										INNER JOIN 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun 
										WHERE 4_buku_kas.id_buku_kas = '.$id_buku_kas.' AND 1_tahun_anggaran.status = "1"
								');
	}
	function tampil_data_4_buku_bank(){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.sumber_tujuan like "%bank%" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_4_buku_pajak(){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*,
										1_tahun_anggaran.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.sumber_tujuan like "%pajak%" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_4_buku_kas_laporan($bulan){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*,
										1_tahun_anggaran.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND MONTH(tgl) = "'.$bulan.'" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_4_buku_kas_laporan_bank($bulan){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*,
										1_tahun_anggaran.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.sumber_tujuan like "%bank%" && MONTH(tgl) = "'.$bulan.'" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_4_buku_kas_laporan_pajak($bulan){
		return $this->db->query('SELECT 2_uraian.*,
										2_uraian.id_uraian as id_uraian2,
										4_buku_kas.*,
										1_tahun_anggaran.*
										from 4_buku_kas
										join 2_uraian on 4_buku_kas.id_uraian = 2_uraian.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.sumber_tujuan like "%pajak%" && MONTH(tgl) = "'.$bulan.'" order by 4_buku_kas.tgl asc
								');
	}
	function tampil_data_1_tahun_anggaran_uraian(){
		return $this->db->query('SELECT * from 1_tahun_anggaran where status = 1');
	}
	function realisasi_a1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "3" and "9" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_a1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pemasukan_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "3" and "9" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_b1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "10" and "20" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_b1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "10" and "20" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_c1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "21" and "25" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_c1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "21" and "25" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_d1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "26" and "75" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_d1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "26" and "75" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_e1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "76" and "84" order by 4_buku_kas.id_uraian asc ');	
	}function realisasi_e1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "76" and "84" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_f1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "85" and "110" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_f1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "85" and "110" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_g1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "111" and "139" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_g1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "111" and "139" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_h1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "140" and "160" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_h1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "140" and "160" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_i1(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "161" and "166" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_i1_jumlah(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "161" and "166" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_penggunaan(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pengeluaran_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND  4_buku_kas.id_uraian between "10" and "166" order by 4_buku_kas.id_uraian asc ');	
	}
	function realisasi_penerimaan(){
		return $this->db->query('SELECT 2_uraian.uraian as uraian2, 
										sum(4_buku_kas.pemasukan_dana) as jum,
										2_uraian.*,
	   									4_buku_kas.*,
										1_tahun_anggaran.*
										FROM 4_buku_kas 
										JOIN 2_uraian ON 2_uraian.id_uraian = 4_buku_kas.id_uraian
										join 1_tahun_anggaran on 4_buku_kas.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 4_buku_kas.id_uraian between "3" and "9" order by 4_buku_kas.id_uraian asc ');	
	}
}