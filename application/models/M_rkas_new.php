<?php 
 
class M_rkas_new extends CI_Model{
	function tampil_data_1_tahun_anggaran(){
		return $this->db->get('1_tahun_anggaran');
	}
	function tampil_data_1_tahun_anggaran_uraian(){
		return $this->db->query('SELECT * from 1_tahun_anggaran where status = 1');
	}
	function tampil_data_2_uraian(){
		return $this->db->query('SELECT 2_uraian.*, 
										2_uraian.id_uraian as id_ur,
										2_uraian.id_tahun as id_th,
										2_uraian.kode_uraian as kode_ur,
										1_tahun_anggaran.*,
										3_sumber_dana.*,
										3_sumber_dana.id_uraian as id_uraian_dana
										from 2_uraian 
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										left join 3_sumber_dana on 3_sumber_dana.id_uraian = 2_uraian.id_uraian	
										where 1_tahun_anggaran.status = "1" order by id_ur ');
	}
	function tampil_data_penerimaan_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "3" and "9" ');
	}
	function tampil_data_penerimaan()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "3" and "9" order by 2_uraian.id_uraian asc ');
	}
	function b1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "10" and "20" order by 2_uraian.id_uraian asc');
	}
	function b1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "10" and "20" ');
	}
	function c1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "21" and "25" order by 2_uraian.id_uraian asc ');
	}
	function c1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "21" and "25" ');
	}
	function d1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "26" and "75" order by 2_uraian.id_uraian asc ');
	}
	function d1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "26" and "75" ');
	}
	function e1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "76" and "84" order by 2_uraian.id_uraian asc ');
	}
	function e1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "76" and "84" ');
	}
	function f1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND  2_uraian.id_uraian between "85" and "110" order by 2_uraian.id_uraian asc ');
	}
	function f1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "85" and "110" ');
	}
	function g1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "111" and "139" order by 2_uraian.id_uraian asc ');
	}
	function g1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "111" and "139" ');
	}
	function h1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "140" and "160" order by 2_uraian.id_uraian asc ');
	}
	function h1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "140" and "160" ');
	}
	function i1()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND 2_uraian.id_uraian between "161" and "166" order by 2_uraian.id_uraian asc');
	}
	function i1_jumlah()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "161" and "166" ');
	}
	function jumlah_penggunaan_dana()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "10" and "166" ');
	}
	function jumlah_penerimaan_dana()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where  1_tahun_anggaran.status = "1" AND id_uraian between "3" and "9" ');
	}
	function jumlah_penggunaan_dana_rapbs()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND id_uraian between "10" and "166" ');
	}
	function jumlah_penerimaan_dana_rapbs()
	{
		return $this->db->query('SELECT sum(jumlah) as jum,
										1_tahun_anggaran.*
										from 3_sumber_dana
										join 1_tahun_anggaran on 3_sumber_dana.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND id_uraian between "3" and "9" ');
	}
	function sisa_dana()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "3" ');
	}
	function pendapatan_rutin()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "4" ');
	}
	function bos_pusat()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "5" ');
	}
	function bos_provinsi()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "6" ');
	}
	function bos_kota()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "7" ');
	}
	function bl()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "8" ');
	}
	function pl()
	{
		return $this->db->query('SELECT 2_uraian.*,
										3_sumber_dana.*,
										1_tahun_anggaran.*
										from 2_uraian
										join 3_sumber_dana on 2_uraian.id_uraian=3_sumber_dana.id_uraian
										join 1_tahun_anggaran on 2_uraian.id_tahun = 1_tahun_anggaran.id_tahun
										where 1_tahun_anggaran.status = 1 AND 2_uraian.id_uraian = "9" ');
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
	function perbaharui_semua($data1,$table){
		$this->db->update($table,$data1);
	}
	function aksi_perbaharui($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}