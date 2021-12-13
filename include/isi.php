<?php 

$page = @$_GET['page'];

if ($page == 'kelas') {
	include 'page/kelas/kelas.php';
}elseif ($page =='siswa') {
	include 'page/siswa/siswa.php';
}elseif ($page =='tahun') {
	include 'page/tahun/tahun.php';
}