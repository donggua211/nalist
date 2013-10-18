<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
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
				<h3><?php echo __('Menu'); ?></h3>
				<ul>
					<li><?php echo $this->Html->link(__('Files'), array('controller' => 'docs', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Files List'), array('controller' => 'docs', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New File'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
						
							<li><?php echo $this->Html->link(__('File Category'), array('controller' => 'doc_cats', 'action' => 'index')); ?></li>
							<li class="sub-menu">
								<ul>
									<li><?php echo $this->Html->link(__('File Category List'), array('controller' => 'doc_cats', 'action' => 'index')); ?> </li>
									<li><?php echo $this->Html->link(__('New File Category'), array('controller' => 'doc_cats', 'action' => 'add')); ?> </li>
								</ul>
							</li>
						</ul>
					</li>
					
					<li><?php echo $this->Html->link(__('Functions'), array('controller' => 'features', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Functions List'), array('controller' => 'features', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New Function'), array('controller' => 'features', 'action' => 'add')); ?> </li>
						
							<li><?php echo $this->Html->link(__('Function Category'), array('controller' => 'feature_cats', 'action' => 'index')); ?></li>
							<li class="sub-menu">
								<ul>
									<li><?php echo $this->Html->link(__('Function Category List'), array('controller' => 'feature_cats', 'action' => 'index')); ?> </li>
									<li><?php echo $this->Html->link(__('New Function Category'), array('controller' => 'feature_cats', 'action' => 'add')); ?> </li>
								</ul>
							</li>
						</ul>
					</li>
					
					<li><?php echo $this->Html->link(__('Users'), array('controller' => 'users', 'action' => 'index')); ?></li>
					<li class="sub-menu">
						<ul>
							<li><?php echo $this->Html->link(__('Users List'), array('controller' => 'users', 'action' => 'index')); ?> </li>
							<li><?php echo $this->Html->link(__('New user'), array('controller' => 'users', 'action' => 'add')); ?> </li>
						
							<li><?php echo $this->Html->link(__('Groups'), array('controller' => 'groups', 'action' => 'index')); ?></li>
							<li class="sub-menu">
								<ul>
									<li><?php echo $this->Html->link(__('Groups List'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
									<li><?php echo $this->Html->link(__('New group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
								</ul>
							</li>
						</ul>
					</li>
					
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
