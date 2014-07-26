<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('Admin.cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Nalist Admin Panel</h1>
		</div>
		<div id="content">
			<div class="main-menu">
				<h3><?php echo __('User & Group'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('Users'), array('plugin' => 'admin', 'controller' => 'users', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Users'), array('plugin' => 'admin', 'controller' => 'users', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New User'), array('plugin' => 'admin', 'controller' => 'users', 'action' => 'add')); ?> </li>
						</ul>
					</li>
					
					<li><?php echo $this->Html->link(__('Groups'), array('plugin' => 'admin', 'controller' => 'groups', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Groups'), array('plugin' => 'admin', 'controller' => 'groups', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New Group'), array('plugin' => 'admin', 'controller' => 'groups', 'action' => 'add')); ?> </li>
						</ul>
					</li>
				</ul>
			
				<h3><?php echo __('Area'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('Area'), array('plugin' => 'admin', 'controller' => 'areas', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Areas'), array('plugin' => 'admin', 'controller' => 'areas', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New area'), array('plugin' => 'admin', 'controller' => 'areas', 'action' => 'add')); ?> </li>
						</ul>
					</li>
				</ul>
				
				<h3><?php echo __('Information'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'admin', 'controller' => 'categories', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Categories'), array('plugin' => 'admin', 'controller' => 'categories', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New category'), array('plugin' => 'admin', 'controller' => 'categories', 'action' => 'add')); ?> </li>
						</ul>
					</li>
				</ul>
				<ul>
					<li><?php echo $this->Html->link(__('Filter'), array('plugin' => 'admin', 'controller' => 'filters', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('filters'), array('plugin' => 'admin', 'controller' => 'filters', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New filter'), array('plugin' => 'admin', 'controller' => 'filters', 'action' => 'add')); ?> </li>
						</ul>
					</li>
				</ul>
				<ul>
					<li><?php echo $this->Html->link(__('Information'), array('plugin' => 'admin', 'controller' => 'infos', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Information'), array('plugin' => 'admin', 'controller' => 'infos', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New information'), array('plugin' => 'admin', 'controller' => 'infos', 'action' => 'add')); ?> </li>
						</ul>
					</li>
				</ul>
				
				<ul>					
					<li><?php echo $this->Html->link(__('Log Out'), array('controller' => 'admin_users', 'action' => 'logout')); ?></li>
				</ul>
			</div>
			
			<div class="main-content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			
			
		</div>
		<div id="footer">
			Powered by Cakephp, Author: <?php echo $this->Html->link(
					'Kevin',
					'http://donggua211.emma-paipai.com/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
