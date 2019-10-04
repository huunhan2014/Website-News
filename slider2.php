<?php $kq = $t->TinNoiBat(4, 6, $lang) ?>

<style>
    .hinhtinnoibattt {
        height: 160px;
    }

    .tieudetinnoibattt {
        height: 45px;
        overflow: hidden;
    }
</style>

<ul class="blog medium">
    <?php while ($row = $kq->fetch_assoc()) { ?>
        <li class="post">
            <a href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?>">
                <span class="icon gallery"></span>
                <img src='<?= $row['urlHinh'] ?>' alt='img' onerror="this.src='/news/defaultImg.jpg'" class="hinhtinnoibattt">
            </a>
            <h5><a href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?>" class="tieudetinnoibattt"> <?= $row['TieuDe'] ?> </a></h5>
            <ul class="post_details simple">
                <li class="category"><a href="cat/<?= $row['Ten_KhongDau']?>/" title="<?= $row['TenLT'] ?>"> <?= $row['TenLT'] ?> </a></li>
                <li class="date">
                    <?= date('d/m/Y', strtotime($row['Ngay'])) ?>
                </li>
            </ul>
        </li>
    <?php } ?>

</ul>