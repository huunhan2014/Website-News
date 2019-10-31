<?php
session_start();
$p = isset($_GET['p']) ? $_GET['p'] : ''; //day la tham so
require_once "class/tin.php";
$t = new tin;
$lang = 'vi';
if (isset($_GET['lang']) == true) $lang = $_GET['lang'];
else if (isset($_SESSION['lang']) == true) $lang = $_SESSION['lang'];
$arrLang = array('vi', 'en');
if (in_array($lang, $arrLang) == false) $lang = 'vi';
$_SESSION['lang'] = $lang;
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<title><?= $t->getTitle($p); ?> </title>
	<base href="<?= BASE_URL ?>" /> <!-- định dạng lại khi dùng htaccess -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--meta-->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="keywords" content="Medic, Medical Center" />
	<meta name="description" content="Responsive Medical Health Template" />
	<!--style-->
	<link href='//fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/superfish.css">
	<link rel="stylesheet" type="text/css" href="style/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css">
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="style/menu_styles.css">
	<link rel="stylesheet" type="text/css" href="style/animations.css">
	<link rel="stylesheet" type="text/css" href="style/responsive.css">
	<link rel="stylesheet" type="text/css" href="style/odometer-theme-default.css">
	<!--<link rel="stylesheet" type="text/css" href="style/dark_skin.css">-->
	<!--<link rel="stylesheet" type="text/css" href="style/high_contrast_skin.css">-->
	<link rel="shortcut icon" href="images/favicon.ico">
</head>
<!--<body class="image_1">
	<body class="image_1 overlay">
	<body class="image_2">
	<body class="image_2 overlay">
	<body class="image_3">
	<body class="image_3 overlay">
	<body class="image_4">
	<body class="image_4 overlay">
	<body class="image_5">
	<body class="image_5 overlay">
	<body class="pattern_1">
	<body class="pattern_2">
	<body class="pattern_3">
	<body class="pattern_4">
	<body class="pattern_5">
	<body class="pattern_6">
	<body class="pattern_7">
	<body class="pattern_8">
	<body class="pattern_9">
	<body class="pattern_10">-->

<body>
	<div class="site_container">
		<!--<div class="header_top_bar_container style_2 clearfix">
			<div class="header_top_bar_container style_2 border clearfix">
			<div class="header_top_bar_container style_3 clearfix">
			<div class="header_top_bar_container style_3 border clearfix">
			<div class="header_top_bar_container style_4 clearfix">
			<div class="header_top_bar_container style_4 border clearfix">
			<div class="header_top_bar_container style_5 clearfix">
			<div class="header_top_bar_container style_5 border clearfix"> -->
		<div class="header_top_bar_container style_3 clearfix">
			<?php require "header_top.php" ?>
		</div>
		<!--<div class="header_container small">
			<div class="header_container style_2">
			<div class="header_container style_2 small">
			<div class="header_container style_3">
			<div class="header_container style_3 small">-->
		<div class="header_container">
			<div class="header clearfix">
				<div class="logo">
					<h1><a href="" title="{Tin_Tuc_Tong_Hop}">{Tin_Tuc_Tong_Hop}</a></h1>
					<h4>{Sub_SiteTitle}</h4>
				</div>
				<div class="placeholder">728 x 90</div>
			</div>
		</div>
		<!-- <div class="menu_container style_2 clearfix">
			<div class="menu_container style_3 clearfix">
			<div class="menu_container style_... clearfix">
			<div class="menu_container style_10 clearfix">
			<div class="menu_container sticky clearfix">-->
		<?php require "menu.php" ?>
		<div class="page">
			<div class="page_layout clearfix">
				<div class="row page_margin_top">
					<div class="column column_2_3">
						<?php
						if ($p == "detail") require "chitiettin.php";
						else if ($p == "cat") require "tintrongloai.php";
						else if ($p == "tags") require "tintrongtags.php";
						else if ($p == "search") require "ketquatimkiem.php";
						else if ($p == "lienhe") require "lienhe.php";
						else {
							?>
							<?php require "slider.php" ?>
							<div id="small_slider" class='slider_posts_list_container small'>
							</div>
							<div class="row page_margin_top">
								<h4 class="box_header" title="slider2.php">{Tin_Noi_Bat}</h4>
								<?php require "slider2.php" ?>
							</div>
							<h4 class="box_header page_margin_top_section" title="tinmoi.php">{Tin_Moi_Nhat}</h4>
							<div class="row">
								<?php $kq = $t->TinMoi(0, 2, $lang);
									include "tinmoi.php" ?>
								<?php $kq = $t->TinMoi(2, 2, $lang);
									include "tinmoi.php" ?>
							</div>
						<?php } ?>
					</div>
					<div class="column column_1_3">

						<?php $idLT = 1;
						require "tinmoitrongloai.php" ?>
						<?php $idLT = 10;
						require "tinmoitrongloai.php" ?>

						<h4 class="box_header page_margin_top_section" title="tinngaunhien.php">{Ban_Xem_Chua} ?</h4>
						<div class="vertical_carousel_container clearfix">

							<?php require "tinngaunhien.php"; ?>

						</div>

						<?php require "listloaitin.php"; ?>
						<?php require "listtag.php"; ?>
					</div>
				</div>
				<?php if ($p == "") { ?>
					<div class="row page_margin_top_section">
						<div class="column column_1_1">
							<h4 class="box_header">Top Posts</h4>
							<div class="tabs no_scroll margin_top_10 clearfix">
								<ul class="tabs_navigation small clearfix">

									<li>
										<a href="#most-read" title="{Tin_Xem_Nhieu}">
										{Tin_Xem_Nhieu}
										</a>
									</li>
									<li>
										<a href="#most-commented" title="{Moi_Phan_Hoi}">
											{Moi_Phan_Hoi}
										</a>
									</li>
								</ul>

								<?php require "tinxemnhieu.php"; ?>
								<?php require "tinmoicophanhoi.php"; ?>
							</div>
						</div>
					</div>
				<?php } ?>
				<!-- <div class="row page_margin_top_section">
					<div class="column column_1_3">
						<h4 class="box_header">Featured Videos</h4>
						<div class="horizontal_carousel_container big page_margin_top">
							<ul class="blog horizontal_carousel visible-1 autoplay-0 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
								<li class="post">
									<a href="post_video_2.html" title="Struggling Nuremberg Sack Coach Verbeek">
										<span class="icon video"></span>
										<img src='images/samples/330x242/image_03.jpg' alt='img'>
									</a>
									<h5 class="with_number">
										<a href="post_video_2.html" title="Struggling Nuremberg Sack Coach Verbeek">Struggling Nuremberg Sack Coach Verbeek</a>
										<a class="comments_number" href="post_video_2.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
									</h5>
									<ul class="post_details simple">
										<li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
										<li class="date">
											10:11 PM, Feb 02
										</li>
									</ul>
								</li>
								<li class="post">
									<a href="post_video.html" title="Built on Brotherhood, Club Lives Up to Name">
										<span class="icon video"></span>
										<img src='images/samples/330x242/image_14.jpg' alt='img'>
									</a>
									<h5 class="with_number">
										<a href="post_video.html" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
										<a class="comments_number" href="post_video.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
									</h5>
									<ul class="post_details simple">
										<li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
										<li class="date">
											10:11 PM, Feb 02
										</li>
									</ul>
								</li>
								<li class="post">
									<a href="post_video_2.html" title="New Painkiller Rekindles Addiction Concerns">
										<span class="icon video"></span>
										<img src='images/samples/330x242/image_04.jpg' alt='img'>
									</a>
									<h5 class="with_number">
										<a href="post_video_2.html" title="New Painkiller Rekindles Addiction Concerns">New Painkiller Rekindles Addiction Concerns</a>
										<a class="comments_number" href="post_video_2.html#comments_list" title="2 comments">2<span class="arrow_comments"></span></a>
									</h5>
									<ul class="post_details simple">
										<li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
										<li class="date">
											10:11 PM, Feb 02
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="column column_1_3">
						<h4 class="box_header">Latest Posts</h4>
						<div class="vertical_carousel_container clearfix">
							<ul class="blog small vertical_carousel autoplay-1 scroll-1 navigation-1 easing-easeInOutQuint duration-750">
								<li class="post">
									<a href="post_gallery.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">
										<span class="icon small gallery"></span>
										<img src='images/samples/100x100/image_06.jpg' alt='img'>
									</a>
									<div class="post_content">
										<h5>
											<a href="post_gallery.html" title="Study Linking Illnes and Salt Leaves Researchers Doubtful">Study Linking Illnes and Salt Leaves Researchers Doubtful</a>
										</h5>
										<ul class="post_details simple">
											<li class="category"><a href="category_health.html" title="HEALTH">HEALTH</a></li>
											<li class="date">
												10:11 PM, Feb 02
											</li>
										</ul>
									</div>
								</li>
								<li class="post">
									<a href="post.html" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">
										<img src='images/samples/100x100/image_12.jpg' alt='img'>
									</a>
									<div class="post_content">
										<h5>
											<a href="post.html" title="Syrian Civilians Trapped For Months Continue To Be Evacuated">Syrian Civilians Trapped For Months Continue To Be Evacuated</a>
										</h5>
										<ul class="post_details simple">
											<li class="category"><a href="category_world.html" title="WORLD">WORLD</a></li>
											<li class="date">
												10:11 PM, Feb 02
											</li>
										</ul>
									</div>
								</li>
								<li class="post">
									<a href="post.html" title="Built on Brotherhood, Club Lives Up to Name">
										<img src='images/samples/100x100/image_02.jpg' alt='img'>
									</a>
									<div class="post_content">
										<h5>
											<a href="post.html" title="Built on Brotherhood, Club Lives Up to Name">Built on Brotherhood, Club Lives Up to Name</a>
										</h5>
										<ul class="post_details simple">
											<li class="category"><a href="category_sports.html" title="SPORTS">SPORTS</a></li>
											<li class="date">
												10:11 PM, Feb 02
											</li>
										</ul>
									</div>
								</li>
								<li class="post">
									<a href="post_quote.html" title="Nuclear Fusion Closer to Becoming a Reality">
										<img src='images/samples/100x100/image_13.jpg' alt='img'>
									</a>
									<div class="post_content">
										<h5>
											<a href="post_quote.html" title="Nuclear Fusion Closer to Becoming a Reality">Nuclear Fusion Closer to Becoming a Reality</a>
										</h5>
										<ul class="post_details simple">
											<li class="category"><a href="category_science.html" title="SCIENCE">SCIENCE</a></li>
											<li class="date">
												10:11 PM, Feb 02
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="column column_1_3">

					</div>
				</div> -->
			</div>
		</div>
		<div class="footer_container">
			<div class="footer clearfix">
				<div class="row">

					<?php require "footer1.php" ?>
					<?php //require "footer2.php" ?>
					<?php //require "footer3.php" ?>
				</div>
				<div class="row page_margin_top_section">
					
					<div class="column_right">
						<a class="scroll_top" href="#top" title="Back To Top">Back To Top</a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="background_overlay"></div>
	<!--js-->
	<!-- <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script> -->
	<script type="text/javascript" src="js/jquery-migrate-1.4.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.ba-bbq.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.11.1.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
	<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
	<script type="text/javascript" src="js/jquery.transit.min.js"></script>
	<script type="text/javascript" src="js/jquery.sliderControl.js"></script>
	<script type="text/javascript" src="js/jquery.timeago.js"></script>
	<script type="text/javascript" src="js/jquery.hint.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.qtip.min.js"></script>
	<script type="text/javascript" src="js/jquery.blockUI.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/odometer.min.js"></script>
</body>

</html>
<?php
$str = ob_get_clean();
require "lang_$lang.php";
$str = str_replace("{Ban_Xem_Chua}", BAN_XEM_CHUA, $str);
$str = str_replace("{Loai_Tin}", LOAI_TIN, $str);
$str = str_replace("{Trang_Chu}", TRANG_CHU, $str);
$str = str_replace("{Moi_Nhan}", MOI_NHAN, $str);
$str = str_replace("{Tu_Khoa}", TU_KHOA, $str);
$str = str_replace("{Tin_Tuc_Tong_Hop}", TIN_TUC_TONG_HOP, $str);
$str = str_replace("{Sub_SiteTitle}", SUB_SITETITLE, $str);
$str = str_replace("{Tin_Moi_Nhat}", TIN_MOI_NHAT, $str);
$str = str_replace("{Tin_Noi_Bat}", TIN_NOI_BAT, $str);
$str = str_replace("{Tin_Xem_Nhieu}", TIN_XEM_NHIEU, $str);
$str = str_replace("{Moi_Phan_Hoi}", MOI_PHAN_HOI, $str);
$str = str_replace("{Ve_Chung_Toi}", VE_CHUNG_TOI, $str);
$str = str_replace("{Lien_He_Chung_Toi_Qua_Cac_Kenh}", LIEN_HE_CHUNG_TOI_QUA_CAC_KENH, $str);
$str = str_replace("{Dia_Chi}", DIA_CHI, $str);
$str = str_replace("{Tin_Tuc_Hang_Ngay_Hang_Gio_Du_Moi_Linh_Vuc_Du_Cac_Loai_Thuong_Vang_Ha_Cam_Ham_Ba_Lan_Tong_Hop_Nhanh_Tren_Khap_Moi_Mien}", TIN_TUC_HANG_NGAY_HANG_GIO_DU_MOI_LINH_VUC_DU_CAC_LOAI_THUONG_VANG_HA_CAM_HAM_BA_LAN_TONG_HOP_NHANH_TREN_KHAP_MOI_MIEN, $str);
$str = str_replace("{Lien_He}", LIEN_HE, $str);
echo $str;
?>