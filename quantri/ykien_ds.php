<div class="container-fluid">

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TRỊ Ý KIẾN
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th width="75px">idYKien/Ngay</th>
                                    <th width="80px">Tin</th>
                                    <th>Nội Dung</th>
                                    <th width="120px">Họ Tên/Email</th>
                                    <th width="103px" >Cập Nhật/Xóa</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $kq = $qt->ListYKien(); ?>
                                <?php while ($row = $kq->fetch_assoc()) { ?>

                                    <tr>
                                        <td>
                                            <p>idYKien: <?= str_pad($row['idYKien'], 3, 0, STR_PAD_LEFT) ?></p>
                                            <p><?= date('d/m/Y', strtotime($row['Ngay'])) ?></p>
                                        </td>
                                        <td><?= $row['TieuDe'] ?></td>
                                        <td><?= $row['NoiDung'] ?></td>
                                        <td>
                                            <p>
                                                Họ Tên: <?= $row['HoTen'] ?>
                                            </p>
                                            <p>
                                                Email: <?= $row['Email'] ?>
                                            </p>
                                        </td>
                                        <td >
                                            <p>
                                                <a href="?p=ykien_sua&idYKien=<?= $row['idYKien'] ?>" class="btn bg-blue waves-effect">Chỉnh</a> &nbsp;
                                                &nbsp;
                                                <a href="ykien_xoa.php?idYKien=<?= $row['idYKien'] ?>" class="btn bg-red waves-effect" onclick="return confirm('bạn có chắc xóa ý kiến: <?= $row['NoiDung'] ?>')">Xóa</a>
                                            </p>
                                            <p style="text-align: center; font-weight: bold">
                                                <?= ($row['AnHien'] == 1) ? "Đang Hiện" : "Đang Ẩn" ?>
                                            </p>
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