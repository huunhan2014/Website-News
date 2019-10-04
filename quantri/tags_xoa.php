<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idTag = ($_GET['idTag']) ? $_GET['idTag'] : "";
settype($idTag, "int");


$kq = $qt->Tags_Xoa($idTag);
header("location:index.php?p=tags_ds");
