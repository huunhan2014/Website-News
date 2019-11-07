<?php
if (isset($_POST['HoTen'])) {
    $HoTen = $_POST['HoTen'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $idGroup = $_POST['idGroup'];
    $GioiTinh = $_POST['GioiTinh'];
    $qt->Users_Them($HoTen, $Username, $Email, $idGroup, $GioiTinh);
    echo "<script> document.location='index.php?p=users_ds';</script>";
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
                    Thêm Users
                </h2>
               
            </div>
            <div class="body">
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="HoTen"> Họ Tên </label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="HoTen" name="HoTen" class="form-control" placeholder="Nhập họ tên " maxlength="20" minlength="3" required> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Username"> Username</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Nhập Username" id="Username" name="Username" required> </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Email">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" id="Email" name="Email" class="form-control" placeholder="Nhập Email"  >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Cấp Độ</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line abc">
                                    <input type="radio" id="CD1" name="idGroup" checked value="1">
                                    <label for="CD1">Admin</label>
                                    <input type="radio" id="CD0" name="idGroup" value="0">
                                    <label for="CD0">Writer</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Giới Tính</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line abc">
                                    <input type="radio" id="GT1" name="GioiTinh" checked value="1">
                                    <label for="GT1">Nam</label>
                                    <input type="radio" id="GT0" name="GioiTinh" value="0">
                                    <label for="GT0">Nữ</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">THÊM USERS</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->