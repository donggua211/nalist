<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?> - ACE Affiliate Relationship System
	</title>
	<?php

		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="page-profile">
	<div class="wrapper">
		<div class="header header-logged-out">
			<div class="container">
				<?php echo $this->Html->link('ACE Relationship System', '/', array('class' => 'header-logo-wordmark')); ?>

				
				<ul class="top-nav">
					<li class="explore"><a href="/explore">Explore</a></li>
					<li class="features"><a href="/features">Features</a></li>
					<li class="enterprise"><a href="https://enterprise.github.com/">Enterprise</a></li>
					<li class="blog"><a href="/blog">Blog</a></li>
					<li class="blog"><a href="/blog">Blog</a></li>
					<li class="blog"><a href="/blog">Blog</a></li>
				</ul>
				
				<div class="command-bar">
					<form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

						<input type="text" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
						>
					</form>
				</div>
				
			</div>
		</div>

		<div class="pagehead repohead instapaper_ignore readability-menu">
			<div class="container">
				<div class="entry-title public">
					<?php echo $this->Html->getCrumbs(' > ', 'Home'); ?>
				</div>
			</div><!-- /.container -->
		</div>
	
		<div class="site clearfix">
			<div id="site-container" class="context-loader-container" data-pjax-container>
				<div class="container">
					<?php echo $this->Session->flash(); ?>

					<?php echo $this->fetch('content'); ?>

				</div><!-- /.profilecols -->
			</div><!-- /.container -->

		</div>
		
		<div class="modal-backdrop"></div>
	</div><!-- /.wrapper -->

    <div class="container">
		<div class="site-footer">
			<ul class="site-footer-links right">
			  <li><?php echo $this->Html->link('Home', '/'); ?></li>

			</ul>

			<ul class="site-footer-links">
			  <li>&copy; 2013 <span title="0.01955s from github-fe118-cp1-prd.iad.github.net">Kevin</span></li>
			</ul>
		</div><!-- /.site-footer -->
	</div><!-- /.container -->
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>