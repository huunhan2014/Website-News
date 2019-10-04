<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idTin = $_GET['idTin'];
settype($idTin, "int");

$kq = $qt->SoYKienTrongTin($idTin);
if ($kq->num_rows > 0) { 
    $r=$kq->fetch_assoc();
    echo "<script> alert(' Tin nay ko the xoa vi` co: ".$r['soykien'].  " y kien '); 
    history.go(-1);</script> ";
    return ;
} else {
$kq = $qt->Tin_Xoa($idTin);
}
header("location:index.php?p=tin_ds");
