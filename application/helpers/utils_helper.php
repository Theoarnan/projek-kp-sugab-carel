<?php

function getJenisKelaminLengkap($jk)
{
	return ($jk == "L") ? "Laki-Laki" : "Perempuan";
}

function getLevel($level)
{
	return ($level == "1") ? "Admin" : "Kasir";
}

function getLastNomor($table)
{
	$CI = &get_instance();

	$queryMaxId = "select max(no) as no from $table where year(transaksi_tanggal) = year(now()) ";
	$queryMaxId .= "AND month(transaksi_tanggal) = month(now())";
	$no = $CI->db->query($queryMaxId)->row();
	return $no;
}

function getLastNomorTunda($table)
{
	$CI = &get_instance();

	$queryMaxId = "select max(no) as no_tunda from $table where year(tgl_transaksi_tunda) = year(now()) ";
	$queryMaxId .= "AND month(tgl_transaksi_tunda) = month(now())";
	$nomor = $CI->db->query($queryMaxId)->row();
	return $nomor;
}

function autoCreate($prefix, $delimeter, $nomor)
{
	$s = "";
	foreach ($prefix as $value) {
		$s .= $value . $delimeter;
	}
	return $s . date("Y")
		. $delimeter
		. date("m")
		. $delimeter
		. str_pad($nomor, 4, "0", STR_PAD_LEFT);
}



//Fungsi Cek User sudah login
function checkOnLogin()
{
	$CI = &get_instance();
	if (!$CI->session->userdata('is_logged_in')) {
		redirect("auth");
	}
}

function isSuper()
{
	checkOnLogin();
	$CI = &get_instance();
	if ($CI->session->userdata('role') != "superadmin") {
		redirect("errors/forbidden");
		die();
	}
}

function isAdmin()
{
	checkOnLogin();
	$CI = &get_instance();
	if ($CI->session->userdata('role') != "admin") {
		redirect("errors/forbidden");
		die();
	}
}

// function checkOnLogin()
// {
// 	$ci = &get_instance();
// 	$user_session = $ci->session->userdata('idUser');
// 	if ($user_session) {
// 		redirect('welcome');
// 	}
// }

// Fungsi Cek User jika belum Login
function checkNoLogin()
{
	$ci = &get_instance();
	$user_session = $ci->session->userdata('idUser');
	if (!$user_session) {
		redirect('Auth');
	}
}

function logout()
{
	$this->session->sess_destroy();
	redirect('auth');
}

// Format Rupiah
function formatRupiah($angka)
{
	return "Rp. " . number_format($angka, 2, ",", ".") . ",-";
}

function roleAkses()
{
	$ci = &get_instance();
	$ci->load->library('Fungsi');
	if ($ci->fungsi->user_login()->level != 1) {
		redirect('welcome');
	}
}

//Pesan Sukses
function show_succ_msg($content = '', $size = '14px')
{
	if ($content != '') {
		return   '<p class="box-msg">
				  <div class="info-box alert-warning">
					  <div class="info-box-icon">
						  <i class="fa fa-check-circle"></i>
					  </div>
					  <div class="info-box-content" style="font-size:' . $size . '">
						' . $content
			. '</div>
				  </div>
				</p>';
	}
}
//Pesan Error
function show_err_msg($content = '', $size = '14px')
{
	if ($content != '') {
		return   '<p class="box-msg">
				  <div class="info-box alert-error">
					  <div class="info-box-icon">
						  <i class="fa fa-warning"></i>
					  </div>
					  <div class="info-box-content" style="font-size:' . $size . '">
						' . $content
			. '</div>
				  </div>
				</p>';
	}
}

function sessionAdmin(){
if($this->AuthModel->is_role() != "admin"){
	redirect("Auth");
}
}

function sessionSuper(){
	if($this->AuthModel->is_role() != "admin"){
		redirect("Auth");
	}
	}
