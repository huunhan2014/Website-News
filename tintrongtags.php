<?php
$TenTag_KhongDau = isset($_GET['TenTag_KhongDau']) ? $_GET['TenTag_KhongDau'] : '';
echo $idTag = $t->LayidTag($TenTag_KhongDau) ;

$pageSize = PAGEGINATION_PERPAGE; //so tin se hien trong 1 tin
if (isset($_GET['pageNum'])) $pageNum = $_GET['pageNum']; // trang user xem
settype($pageNum, "int");
if ($pageNum <= 0) $pageNum = 1;
$totalRows = 0;
$offset = PAGEGINATION_OFFSET;
$kq = $t->TinTrongTags($idTag, $pageNum, $pageSize, $totalRows); //chi lay 1 trang thu $pageNum, voi $pageSize record 

?>
<div class="page_header clearfix">
    <div class="page_header_left">
        <h1 class="page_title"><?= $t->LayTenTags($idTag); ?> </h1>
    </div>
    <div class="page_header_right">
        <ul class="bread_crumb">
            <li>
                <a title="Trang chủ  " href="">
                    Trang chủ
                </a>
            </li>
            <li class="separator icon_small_arrow right_gray">
                &nbsp;
            </li>
            <li>
                <?= $t->LayTenTags($idTag); ?>
            </li>
        </ul>
    </div>
</div>

<ul class="blog big">
    <?php while ($row = $kq->fetch_assoc()) { ?>

        <li class="post tintrongloai">
            <a href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?> ">
                <img src='<?= $row['urlHinh'] ?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
            </a>
            <div class="post_content">
                <h2 class="with_number">
                    <a class="tieude" href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?> "> <?= $row['TieuDe'] ?> </a>
                    <a class="comments_number" href="#" title="<?= $row['SoLanXem'] ?> Views" style="cursor: default" onclick="return false">
                    <?= $row['SoLanXem'] ?> <span class="arrow_comments"></span>
                    </a>
                </h2>
                <ul class="post_details">
                    <li class="date">
                        <?= date('d/m/Y', strtotime($row['Ngay'])) ?>
                    </li>
                </ul>
                <p><?= $row['TomTat'] ?>.</p>
            </div>
        </li>

    <?php } ?>
</ul>

<div class="page_margin_top_section">&nbsp;</div>

<?php if ($totalRows > $pageSize) { ?>
    <?php $totalPages = ceil($totalRows / $pageSize);
        $from = $pageNum - $offset;
        $to = $pageNum + $offset;
        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalPages) $to = $totalPages;
        $pagePrev = $pageNum - 1;
        $pageNext = $pageNum + 1;

        ?>
    <ul class="pagination clearfix page_margin_top_section">
        <?php
            //hien linh toi trang dau, trang trc
            if ($pageNum > 1) {
                ?>

            <li>
                <a href="tags/<?= $TenTag_KhongDau ?>/"> Đầu </a>
            </li>
            <li>
                <a href="tags/<?= $TenTag_KhongDau ?>/<?= $pagePrev ?>/"> Trước </a>
            </li>

        <?php } //if($pageNum>1) 
            ?>

        <?php //hien cac con số trong thanh phân trang
            for ($j = $from; $j <= $to; $j++) { ?>
            <?php if ($j != $pageNum) { ?>

                <li>
                    <a href="tags/<?= $TenTag_KhongDau ?>/<?= $j ?>/"> <?= $j ?> </a>
                </li>
            <?php } else { ?>
                <li class="selected">
                    <a href="tags/<?= $TenTag_KhongDau ?>/<?= $j ?>/"> <?= $j ?> </a>
                </li>

            <?php } //if 
                    ?>
        <?php } //for 
            ?>

        <?php
            //hien linh toi trang sau, trang cuoi
            if ($pageNum < $totalPages) {
                ?>

            <li>
                <a href="tags/<?= $TenTag_KhongDau ?>/<?= $pageNext ?>/"> Sau </a>
            </li>
            <li>
                <a href="tags/<?= $TenTag_KhongDau ?>/<?= $totalPages ?>/"> Cuối </a>
            </li>

        <?php } //if($pageNum>1) 
            ?>

    </ul>

<?php } ?>