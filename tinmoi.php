<ul class="blog column column_1_2">
    <?php while ($row = $kq->fetch_assoc()) { ?>
        <li class="post tinmoinhat">
            <a href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?>">
                <img src=' <?= $row['urlHinh'] ?> ' alt='img' onerror="this.src='/news/defaultImg.jpg'">
            </a>
            <h2 class="with_number">
                <a href="bv/<?= $row['TieuDe_KhongDau']; ?>.html" title="<?= $row['TieuDe'] ?>"> <?= $row['TieuDe'] ?> </a>
                <a class="comments_number" href="#" title="<?= $row['SoLanXem'] ?> Views" style="cursor: default" onclick="return false">
                    <?= $row['SoLanXem'] ?><span class="arrow_comments"></span>
                </a>
            </h2>
            <ul class="post_details">
                <li class="category"><a href="cat/<?= $row['Ten_KhongDau'] ?>/" title="<?= $row['TenLT'] ?> "> <?= $row['TenLT'] ?> </a></li>
                <li class="date">
                    <?= date('d/m/Y', strtotime($row['Ngay'])) ?>
                </li>
            </ul>
            <p> <?= $row['TomTat'] ?> </p>
        </li>
    <?php } ?>
</ul>