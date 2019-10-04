<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idLT = $_GET['idLT'];
settype($idLT, "int");

$kq = $qt->SoTinTrongLoaiTin($idLT);
if ($kq->num_rows > 0) { 
    echo "<script> alert('Loai Tin nay ko the xoa'); 
    history.go(-1);</script> ";
    return ;
} else {
    $kq = $qt->LoaiTin_Xoa($idLT);
}
header("location:index.php?p=loaitin_ds");
