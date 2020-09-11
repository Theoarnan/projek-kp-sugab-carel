<?php
function helper_log($no_order, $pegawai, $harga, $piutang, $total){
	$CI =& get_instance();

	// paramter
	$param['log_user']      = $CI->session->userdata('username');
	$param['log_no_order']      = $no_order;
	$param['log_pegawai']      = $pegawai;
	$param['log_harga']      = $harga;
	$param['log_piutang']      = $piutang;
	$param['log_total']      = $total;

	//load model log
	$CI->load->model('ModelLog');

	//save to database
	$CI->ModelLog->save_log($param);

}
