<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="google-site-verification" content="zG3rDH6UffvOvIi5XLxvSgH04LtMOQ_rpeIb12R-3hU" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<title><?php echo (isset($meta_title) && !empty($meta_title) ? $meta_title . ' | ' : '' ). get_site_config('site_name'); ?></title>
		<meta name="keywords" content="<?php echo ((isset($meta_keywords) && !empty($meta_keywords)) ? $meta_keywords . ', ' : '' ) . get_site_config('site_keyword'); ?>" />
		<meta name="description" content="<?php echo (isset($meta_description) && !empty($meta_description)) ? $meta_description : get_site_config('site_description'); ?>" />
		
		<link href="http://img.dvd-oasis.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo get_site_url('rss');?>" />
		
		<link href="http://img.dvd-oasis.com/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://img.dvd-oasis.com/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="http://img.dvd-oasis.com/js/common.js"></script>
		
		<script type="text/javascript" src="http://img.dvd-oasis.com/js/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
		<link rel="stylesheet" href="http://img.dvd-oasis.com/js/jquery-ui/jquery-ui-1.10.3.custom.min.css" type="text/css" media="all" />
		
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-56520020-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</head>
	<body>
		<a name="top"></a>
		<!-- wrapper -->
		<div class="wrapper">
			<!-- top quick link -->
			<div class="header_quick_wrap">
				<div class="header_quick">
					<p class="login_info">
						<?php
						echo get_site_config('site_name').'へようこそいらっしゃいませ！<a href="'.user_login_url().'" target="_blank">会員ログイン</a>, 或いは<a href="'.user_regist_url().'" target="_blank">新規会員登録</a>';
						?>
					</p>
					<ul class="quick_menu">
						<li><a href="<?php echo get_site_url('home');?>">ホーム</a></li>
						<li class="menu_cart"><a href="<?php echo cart_url(); ?>" target="_blank">カート</a></li>
						<li><a href="<?php echo order_url();?>" target="_blank">購入商品を見る</a></li>
						<li><a href="<?php echo get_page_url('privacy');?>">プライバシーポリシー</a></li>
						<li><a href="<?php echo get_page_url('faq');?>">Ｑ＆Ａ</a></li>
						<li class="last"><a href="<?php echo get_page_url('link');?>">バナー</a></li>
					</ul>
				</div>
			</div>
			<!-- top quick link end -->
			
			<!-- page header begin -->
			<div class="header_wrap">
				<div class="header">
					<!-- Logo -->
					<h1 class="logo">
						<a href="<?php echo get_site_url('home');?>">
							<img alt="" src="http://img.dvd-oasis.com/logo.png" height="60px">
						</a>

					</h1>
					
					<div style="float: left; margin-left: 10px;">
						<a href="https://twitter.com/dvdoasis" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @dvdoasis</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
					</div>
					<!-- search bar -->
					<div itemscope itemtype="http://schema.org/WebSite" class="search_box">
						<meta itemprop="url" content="<?php echo site_url('dvd/search');?>"/>
						<form itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" method="post" action="<?php echo site_url('dvd/search');?>">
							<meta itemprop="target" content="<?php echo site_url('dvd/search');?>"/>
							<div class="keyword"><input itemprop="query-input" value="<?php echo isset($the_filter['keyword']) ? $the_filter['keyword'] : ''; ?>" name="keyword"></div>
							<div class="submit_btn"><input type="image" align="left" src="http://img.dvd-oasis.com/search_btn.png"></div>
						</form>
					</div>
					
					<div class="hot_keyword">
						<ul>
						<li class="title">人気のキーワード:</li>
						<?php
						$keywords = hot_search_keyword($count = 5, $order_by = 'RAND()');
						$hot_key = rand(0, 4);
						foreach($keywords as $key => $val) {
							echo '<li'.($key == $hot_key ? ' class="hot"' : '').'><a href="'.site_url('dvd/search'). '?keyword='.$val['keyword'].'" class="style9"><h6>'.$val['keyword'].'</h6></a></li>';
						}
						?>
						</ul>
					</div>
				</div>
			</div>
			<!-- page header end -->
			
			
			<!-- header menu begin -->
			<div class="header_nav_wrap">
				<div class="header_nav">
					<ul>
						<li><a href="<?php echo get_site_url('home');?>">ホーム</a></li>
						<li><a href="<?php echo dvd_list_url();?>">全タイトル</a></li>
						<li><a href="<?php echo get_site_url('new');?>">新着DVD</a></li>
						<li><a href="<?php echo get_site_url('recommend');?>">おすすめ</a></li>
						<li><a href="<?php echo get_page_url('buy_help');?>">ご購入方法</a></li>
						<li><a href="<?php echo get_page_url('contact');?>">お問い合わせ</a></li>
					</ul>
				</div>
			</div>
			<!-- header menu end -->
			
			
			<!--
			<div class="header_notice_wrap">
				<a href="<?php echo site_url('dvd_list');?>">
					<div class="header_notice">
						<p>期間限定お客様感謝セール！　10/20~10/27 すべてのDVDが10％オフ!!</p>
					</div>
				</a>
			</div>
			-->
			
			<!-- page main_wrap start -->
			<div class="main_wrap clearfix">