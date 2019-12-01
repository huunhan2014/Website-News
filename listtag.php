<?php $kq = $t->ListTags($lang); ?>
<h4 class="box_header page_margin_top_section">Tags</h4>
<ul class="taxonomies columns clearfix page_margin_top">
    <?php while ($row = $kq->fetch_assoc()) { ?>
        <li>
            <a href="tags/<?= $row['TenTag_KhongDau'] ?>/" title=" <?=$row['TenTag']?> "> <?=$row['TenTag']?> </a>
        </li>
    <?php } ?>
</ul>