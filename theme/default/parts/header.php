<!DOCTYPE html PUBLIC "-/W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="google-site-verification" content="zG3rDH6UffvOvIi5XLxvSgH04LtMOQ_rpeIb12R-3hU" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<title><?php echo (isset($meta_title) && !empty($meta_title) ? $meta_title . ' | ' : '' ). get_site_config('site_name'); ?></title>
		<meta name="keywords" content="<?php echo ((isset($meta_keywords) && !empty($meta_keywords)) ? $meta_keywords . ', ' : '' ) . get_site_config('site_keyword'); ?>" />
		<meta name="description" content="<?php echo (isset($meta_description) && !empty($meta_description)) ? $meta_description : get_site_config('site_description'); ?>" />
		
		<link href="<?php echo __THEME_URI__; ?>assets/image/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo site_url('rss');?>" />
		
		<link href="<?php echo __THEME_URI__; ?>assets/css/style.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="<?php echo __THEME_URI__; ?>assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="<?php echo __THEME_URI__; ?>assets/js/common.js"></script>
		
		<script type="text/javascript" src="<?php echo __THEME_URI__; ?>assets/js/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
		<link rel="stylesheet" href="<?php echo __THEME_URI__; ?>assets/js/jquery-ui/jquery-ui-1.10.3.custom.min.css" type="text/css" media="all" />
	</head>
	<body>
		<div class="wrap">
			<div class="hd-wrap">
				<div class="hd-inner">
					<nav class="topnav-wrap">
						<ul class="topnav-inner">
							<li><a href="<?php echo site_url('page/howto'); ?>">如何使用</a></li>
							<li><a href="<?php echo site_url('page/first'); ?>">第一次使用</a></li>
							<li><a href="<?php echo site_url('user/login'); ?>">登录</a></li>
							<li><a href="<?php echo site_url('user/logout'); ?>">退出</a></li>
						</ul>
					</nav>
					
					<div class="logo-index-wrap">
						<div class="logo">
							<h1><a href="<?php echo site_url('home'); ?>" rel="home"><?php echo $site_name; ?></a></h1>
						</div>
					</div>
				</div>
			</div>