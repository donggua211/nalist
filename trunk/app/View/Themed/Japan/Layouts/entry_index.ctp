<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 7]>
<html class="ie ie7" lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="ja" xmlns="http://www.w3.org/1999/xhtml">
<!--<![endif]-->
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->css('style.css');
			
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
	</head>
	<body>
		<div class="wrapper">
			<div class="header">
				<div class="header-bd">
					<div class="logo">
						<h1 class="site-title"><a href="home.php" rel="home"><?php echo __('NA List'); ?></a></h1>
					</div>
					<div class="search">
						<form method="GET" id="searchForm" name="searchForm" action="pkg_search.php">
							<fieldset>
								<div class="search-box">
									<div class="search-box-bd empty">
										<input type="search" id="q" name="q" x-webkit-speech="" speech="" class="search-input" value="" accesskey="/">
										<button type="submit"><?php echo __('Search'); ?></button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- #header -->


			<div class="wrap">
				<div class="layout clearfix">

					<div class="main-wrap clearfix">
		
						<?php echo $this->fetch('content'); ?>
					
					</div><!-- #main-content -->
				</div><!-- #layout -->
			</div><!-- #wrap -->
			
			<div class="footer clearfix">
				<a href="home.php"><?php echo __('Home'); ?></a>
				<b>|</b>
				<a href="first.php"><?php echo __('First Time'); ?></a>
				<b>|</b>
				<a href="howto.php"><?php echo __('How To'); ?></a>
				<span><?php echo __('Powered By nalist.com'); ?></span>
			</div><!-- #footer -->
		</div><!-- #wrap -->
	</body>
</html>