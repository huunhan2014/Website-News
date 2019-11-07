<div class="container-fluid">

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TRỊ USERS
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>idUser </th>
                                    <th>Họ Tên </th>
                                    <th>Username </th>
                                    <th>Email</th>
                                    <th>Cấp Độ</th>
                                    <th>Giới Tính </th>
                                    <th>Cập Nhật/Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $kq = $qt->ListUsers(); ?>
                                <?php while ($row = $kq->fetch_assoc()) { ?>

                                    <tr>
                                        <td><?= $row['idUser'] ?></td>
                                        <td><?= $row['HoTen'] ?></td>
                                        <td><?= $row['Username'] ?></td>
                                        <td><?= $row['Email'] ?></td>
                                        <td><?= ($row['idGroup'] == 1) ? "<span class='col-green font-bold'>Admin</span>" : "Writer" ?></td>
                                        <td><?= ($row['GioiTinh'] == 1) ? "<span class='font-bold'>Nam</span>" : "<span class='col-pink font-bold'> Nữ</span>" ?></td>
                                        <td>
                                            <a href="?p=users_sua&idUser=<?= $row['idUser'] ?>" class="btn bg-blue waves-effect">Cập nhật</a> &nbsp;
                                            &nbsp;
                                            <a href="users_xoa.php?idUser=<?= $row['idUser'] ?>" class="btn bg-red waves-effect" onclick="return confirm('bạn có chắc xóa <?= $row['HoTen'] ?>')">Xóa</a>

                                        </td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->


</div>
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>