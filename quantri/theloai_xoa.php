<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt->checkLogin();

$idTL = isset($_GET['idTL']) ? $_GET['idTL'] : '';
settype($idTL, "int");

$kq = $qt->SoTinTrongTheLoai($idTL);
if ($kq->num_rows > 0) { ?>
    <script>
        alert('The Loai nay` ko the xoa');
        // location.href="index.php?p=theloai_ds";
        // history.back();
        document.location = "index.php?p=theloai_ds";
    </script> ;
<?php return;
} else {
    $kq = $qt->TheLoai_Xoa($idTL);
}
header("location:index.php?p=theloai_ds");
