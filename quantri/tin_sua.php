<!-- Basic Validation -->
<?php
$row = null;
$idTin = $_GET['idTin'];
settype($idTin, "int");
$kq = $qt->Tin_ChiTiet($idTin);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['TieuDe'])) {
    $TD = $_POST['TieuDe'];
    $TD_KD = $_POST['TieuDe_KhongDau'];
    $TT = $_POST['TomTat'];
    $Ngay = $_POST['Ngay'];
    $AnHien = $_POST['AnHien'];
    $TNB = $_POST['TinNoiBat'];
    $idTL = $_POST['idTL'];
    $idLT = $_POST['idLT'];
    $urlHinh = $_POST['urlHinh'];
    $ND = $_POST['NoiDungTin'];
    $tags = $_POST['tags'];
    $lang = $_POST['lang'];
    $qt->Tin_Sua($TD, $TD_KD, $TT, $Ngay, $AnHien, $TNB, $urlHinh, $ND, $idTL, $idLT,$idTin, $tags, $lang);
    echo "<script>document.location='index.php?p=tin_ds';</script>";
    exit();
}
?>

<head>
    <script type="text/javascript">
        function selectFileWithCKFinder(elementId) {
            CKFinder.popup({
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function(finder) {
                    finder.on('files:choose', function(evt) {
                        var file = evt.data.files.first();
                        var output = document.getElementById(elementId);
                        output.value = file.getUrl();
                    });
                    finder.on('file:choose:resizedImage', function(evt) {
                        var output = document.getElementById(elementId);
                        output.value = evt.data.resizedUrl;
                    });
                }
            });
        }
    </script>
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

        .form-group .form-control {
            background: #337ab7;
            border-radius: 6px;
            color: yellow;
            font-size: 14px;
            letter-spacing: 1px
        }

     
    </style>
</head>


<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin:auto; float:none">
        <div class="card">
            <div class="header">
                <h2>Cập Nhật Tin</h2>
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
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="TieuDe" required maxlength="100" minlength="10" placeholder="Tiêu đề tin" value="<?= $row['TieuDe'] ?>">

                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="TieuDe_KhongDau" placeholder="Tiêu đề không dấu" value="<?= $row['TieuDe_KhongDau'] ?>">

                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="TomTat"  class="form-control no-resize" placeholder="Tóm Tắt"> <?= $row['TomTat'] ?>   </textarea>

                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="urlHinh" id="urlHinh" class="form-control" onclick="selectFileWithCKFinder('urlHinh')" placeholder="Địa chỉ hình của tin" value="<?= $row['urlHinh'] ?>">
                        </div>
                    </div>

                    <div class="row cleafix">
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="AnHien" id="AH0" value="0" <?= ($row['AnHien'] == 0) ? "checked" : "" ?>>
                                <label for="AH0">Ẩn</label>
                                <input type="radio" name="AnHien" id="AH1" value="1" <?= ($row['AnHien'] == 1) ? "checked" : "" ?>>
                                <label for="AH1" class="m-l-20">Hiện</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="TinNoiBat" id="TNB0" value="0" <?= ($row['TinNoiBat'] == 0) ? "checked" : "" ?>>
                                <label for="TNB0">Tin thường</label>
                                <input type="radio" name="TinNoiBat" id="TNB1" value="1" <?= ($row['TinNoiBat'] == 1) ? "checked" : "" ?>>
                                <label for="TNB1" class="m-l-20">Tin nổi bật</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="lang" id="vi" value="vi" <?= ($row['lang'] == 'vi') ? "checked" : "" ?>>
                                <label for="vi">Tiếng Việt</label>
                                <input type="radio" name="lang" id="en" value="en" <?= ($row['lang'] == 'en') ? "checked" : "" ?>>
                                <label for="en" class="m-l-20">English</label>
                            </div>
                        </div>
                    </div>

                    <div class="row cleafix">
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input class="form-control" name="tags" placeholder="Tags" value="<?= ($row['tags'] == '') ? "ko co tag" : $row['tags'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="datepicker form-control" name="Ngay" placeholder="Chọn Ngày" value="<?= date('d/m/Y', strtotime($row['Ngay'])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row cleafix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <?php $listTL = $qt->ListTheLoai(); ?>
                                <select class="form-control show-tick" name="idTL" id="idTL">
                                    <option value="0">-- Chọn Thể loại --</option>
                                    <?php while ($r = $listTL->fetch_assoc()) { ?>
                                        <?php if ($r['idTL'] == $row['idTL']) { ?>
                                            <option value="<?= $r['idTL'] ?>" selected> <?= $r['TenTL']  ?> </option>
                                        <?php  } else { ?>
                                            <option value="<?= $r['idTL'] ?>"> <?= $r['TenTL']  ?> </option>
                                        <?php  } //if 
                                            ?>
                                    <?php } //while 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-line">
                                <?php $listLT = $qt->LoaiTinTrongTheLoai($row['idTL']); ?>
                                <select class="form-control show-tick" name="idLT" id="idLT">
                                    <option value="0">-- Chọn loại tin--</option>
                                    <?php while ($r = $listLT->fetch_assoc()) { ?>
                                        <?php if ($r['idLT'] == $row['idLT']) { ?>
                                            <option value="<?= $r['idLT'] ?>" selected> <?= $r['Ten'] ?> </option>
                                        <?php } else { ?>
                                            <option value="<?= $r['idLT'] ?>"> <?= $r['Ten'] ?> </option>
                                        <?php }//if ?>
                                    <?php }//while ?>
                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="NoiDungTin" cols="30" rows="10" class="form-control" required placeholder="Nội dung tin"> <?= $row['Content'] ?>   </textarea>
                        </div>
                    </div>

                    <button class="btn btn-primary waves-effect" type="submit">Cập Nhật Tin</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Validation -->
<script src="plugins/ckeditor/ckeditor.js"></script>
<!--Có thể chèn trực tiếp từ net-->
<link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
<script src="plugins/autosize/autosize.js"></script>
<script src="plugins/momentjs/moment.js"></script>
<script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src=" plugins/ckfinder/ckfinder.js"></script>
<script>
    $(document).ready(function(e) {
        $("#idTL").change(function() {
            var idTL = $(this).val();
            $("#idLT").load("news_layloaitin.php?idTL=" + idTL);
        });
        CKEDITOR.replace('NoiDungTin', {
            language: 'vi',
            skin: 'kama',
            filebrowserImageBrowseUrl: 'plugins/ckfinder/ckfinder.html?Type=Images',
            filebrowserImageUploadUrl: 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        });
        CKEDITOR.config.height = 300;
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'D/M/Y',
            weekStart: 1,
            time: false
        });
        $("#form_validation").submit(function() {
            if ($("#idTL").val() == 0) {
                alert("Bạn ơi! Chưa chọn thể loại mà");
                return false;
            }
            if ($("#idLT").val() == 0) {
                alert("Bạn ơi! Chưa chọn loại tin mà");
                return false;
            }
        });
    });
</script>