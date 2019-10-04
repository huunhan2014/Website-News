<?php
$row = null;
$idTag = ($_GET['idTag'])?$_GET['idTag']:'';
settype($idTag, "int");
$kq = $qt->Tags_ChiTiet($idTag);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TenTag'])) {
    $TenTag = $_POST['TenTag'];
    $TenTag_KD = $_POST['TenTag_KhongDau'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $lang = $_POST['lang'];
    $qt->Tags_Sua($idTag,$TenTag, $TenTag_KD, $ThuTu, $AnHien, $lang);
    echo "<script> document.location='index.php?p=tags_ds';</script>";
    exit();
}

?>
<style>
    .form-group .form-line {
        border-bottom: none
    }

    .form-group .form-control {
        padding: 3px;
        border: 1px solid #999
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
                    CHỈNH SỬA TAGS
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
                            <label for="TenTag"> Tên Tag </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="TenTag" name="TenTag" class="form-control" placeholder="Nhập tên tag" maxlength="20" minlength="3" required value="<?= $row['TenTag'] ?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="TenTag_KhongDau"> TênTag không dấu</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Tên Tag không dấu" id="TenTag_KhongDau" name="TenTag_KhongDau" value="<?= $row['TenTag_KhongDau'] ?>"> </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label for="ThuTu">Thứ tự</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập thứ tự" required min="1" max="1000" value="<?= $row['ThuTu'] ?>">
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
                                                <input type="radio" id="AH1" name="AnHien" <?=($row['AnHien']==1)?"checked":"" ?> value="1">
                                                <label for="AH1">Hiện</label>
                                                <input type="radio" id="AH0" name="AnHien" <?=($row['AnHien']==0)?"checked":"" ?> value="0">
                                                <label for="AH0">Ẩn</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3 form-control-label">
                                        <label>Ngôn ngữ</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <div class="form-line abc">
                                                <input type="radio" id="vi" name="lang" <?=($row['lang']=='vi')?"checked":"" ?> value="vi">
                                                <label for="vi">Tiếng Việt</label>
                                                <input type="radio" id="en" name="lang" <?=($row['lang']=='en')?"checked":"" ?> value="en">
                                                <label for="en">English</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT TAG</button> </div>
                                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->