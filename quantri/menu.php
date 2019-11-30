<ul class="list">
    <li class="header">CHUYÊN MỤC </li>
    <li <?php if ($p == '') echo "class='active'"; ?>>
        <a href="index.php">
            <i class="material-icons">home</i>
            <span>Trang Chủ</span>
        </a>
    </li>
    <li>
        <a href="thoat.php">
            <i class="material-icons">input</i>
            <span>Thoát </span>
        </a>
    </li>
    <!-- ================= -->
    <li <?php if ($p == 'theloai_ds' or $p == 'theloai_them') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">perm_media</i>
            <span>Thể Loại</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="?p=theloai_them">Thêm Thể Loại </a>
            </li>
            <li>
                <a href="?p=theloai_ds">Danh Sách Thể Loại</a>
            </li>
        </ul>
    </li>
    <!-- End The Loai -->
    <li <?php if ($p == 'loaitin_ds' or $p == 'loaitin_them') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">view_list</i>
            <span>Loại Tin</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="?p=loaitin_them">Thêm Loại Tin</a>
            </li>
            <li>
                <a href="?p=loaitin_ds">Danh Sách Loại Tin</a>
            </li>
        </ul>
    </li>
    <!-- End Loai Tin -->
    <li <?php if ($p == 'tin_ds' or $p == 'tin_them') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">mode_edit</i>
            <span> Tin</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="?p=tin_them">Thêm Tin</a>
            </li>
            <li>
                <a href="?p=tin_ds">Danh Sách Tin</a>
            </li>
        </ul>
    </li>
    <!-- End Tin -->
    <li <?php if ($p == 'ykien_ds') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">comment</i>
            <span> Ý Kiến</span>
        </a>
        <ul class="ml-menu">

            <li>
                <a href="?p=ykien_ds">Danh Sách Ý Kiến</a>
            </li>
        </ul>
    </li>
    <!-- End Y Kien -->
    <li <?php if ($p == 'users_ds' or $p == 'users_them') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">person</i>
            <span> Users</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="?p=users_them">Thêm User</a>
            </li>
            <li>
                <a href="?p=users_ds">Danh Sách Users</a>
            </li>
        </ul>
    </li>
    <!-- End Users -->
    <li <?php if ($p == 'tags_ds' or $p == 'tags_them') echo "class='active'"; ?>>
        <a href="javascript:void(0);" class="menu-toggle">
            <i class="material-icons">flag</i>
            <span> Tags</span>
        </a>
        <ul class="ml-menu">
            <li>
                <a href="?p=tags_them">Thêm Tags</a>
            </li>
            <li>
                <a href="?p=tags_ds">Danh Sách Tags</a>
            </li>
        </ul>
    </li>
    <!-- End Tags -->


</ul>