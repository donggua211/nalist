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
		<title><?php echo $title_for_layout; ?> - <?php echo __('NA List'); ?></title>
		<?php
			echo $this->Html->css('style.css');
			
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
			
		?>
	</head>
	<body>
		<div class="wrap">
			<div class="hd-wrap">
				<div class="hd-inner">
					<nav class="topnav-wrap">
						<ul class="topnav-inner">
							<li><?php echo $this->Html->link(__('How To'), array('controller' => 'pages', 'action' => 'howto'));  ?></li>
							<li><?php echo $this->Html->link(__('First Time'), array('controller' => 'pages', 'action' => 'first'));  ?></li>
							<li><?php echo $this->Html->link(__('Sign In'), array('controller' => 'users', 'action' => 'signin'));  ?></li>
							<li><?php echo $this->Html->link(__('Sign Up'), array('controller' => 'users', 'action' => 'signup'));  ?></li>
						</ul>
					</nav>
					
					<div class="logo-index-wrap">
						<div class="logo">
							<h1><?php echo $this->Html->link(__('NA List'), '/');  ?></h1>
						</div>
					</div>
				</div>
			</div>


			<div class="contents-wrap">
				<div class="content">
					<?php echo $this->fetch('content'); ?>
				</div>
			</div>
			
			<div class="ft-wrap">
				<div class="ft-inner">
					<div class="ft-links cf">
						<ul>
							<li><?php echo $this->Html->link(__('How To'), array('controller' => 'pages', 'action' => 'howto'));  ?></li>
							<li><?php echo $this->Html->link(__('First Time'), array('controller' => 'pages', 'action' => 'first'));  ?></li>
							<li><?php echo $this->Html->link(__('Sign In'), array('controller' => 'users', 'action' => 'signin'));  ?></li>
							<li><?php echo $this->Html->link(__('Sign Up'), array('controller' => 'users', 'action' => 'signup'));  ?></li>
						</ul>
					</div>
					<div class="ft-copyright">
						<?php echo $this->Html->link(__('"NA List" &copy; All right reserved!'), '/', array('target' => '_blank', 'escape' => false));  ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>