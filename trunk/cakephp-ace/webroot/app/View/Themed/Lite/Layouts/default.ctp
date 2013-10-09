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
					<li><?php echo $this->Html->link('Home', '/'); ?></li>
					<li><?php echo $this->Html->link('Files', array('controller' => 'docs', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Functions', array('controller' => 'features', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('File Cats', array('controller' => 'doc_cats', 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Function Cats', array('controller' => 'feature_cats', 'action' => 'index')); ?></li>
				</ul>
				
				<div class="command-bar">
					<?php 
					echo $this->Form->create(array(
						'url' => '/search',
						'type' => 'get'
					));
					?>
					<?php echo $this->Form->input('q', array(
						'label' => false,
						'placeholder' => 'Search for Docs or Functions',
						'value' => isset($q) ? $q : '',
					)); ?>
					<?php echo $this->Form->end(); ?>
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