<?php
$row = null;
$idYKien = ($_GET['idYKien']) ? $_GET['idYKien'] : '';
settype($idYKien, "int");
$kq = $qt->YKien_ChiTiet($idYKien);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['AnHien'])) {

    $AnHien = $_POST['AnHien'];

    $qt->YKien_Sua($idYKien, $AnHien);
    echo "<script> document.location='index.php?p=ykien_ds';</script>";
    exit();
}

?>
<style>
    .form-group {
        margin-bottom: 15px;
    }

    .form-group .form-line {
        border-bottom: none
    }

    .form-group .form-control {
        padding: 3px;
        border: 1px solid #999;
      
    }

    .form-group .form-line.abc {
        padding-top: 5px;
    }

   
</style>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    CHỈNH SỬA Ý KIẾN
                </h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TieuDe"> Tên Tin </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TieuDe" name="TieuDe" class="form-control" value="<?= $row['TieuDe'] ?>" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="NoiDung"> Ý Kiến</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea class="form-control" id="NoiDung" name="NoiDung" disabled cols="30" rows="5"> <?= $row['NoiDung'] ?> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Ẩn hiện</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line abc">
                                    <input type="radio" id="AH1" name="AnHien" <?= ($row['AnHien'] == 1) ? "checked" : "" ?> value="1">
                                    <label for="AH1">Hiện</label>
                                    <input type="radio" id="AH0" name="AnHien" <?= ($row['AnHien'] == 0) ? "checked" : "" ?> value="0">
                                    <label for="AH0">Ẩn</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT Ý KIẾN</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->