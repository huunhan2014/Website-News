<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idUser = ($_GET['idUser']) ? $_GET['idUser'] : "";
settype($idUser, "int");


$kq = $qt->Users_Xoa($idUser);
header("location:index.php?p=users_ds");
