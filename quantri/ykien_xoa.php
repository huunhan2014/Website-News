<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idYKien = ($_GET['idYKien']) ? $_GET['idYKien'] : "";
settype($idYKien, "int");


$kq = $qt->YKien_Xoa($idYKien);
header("location:index.php?p=ykien_ds");
