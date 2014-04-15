<!DOCTYPE HTML>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php

		echo $this->Html->css('style.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="wrapper">
		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>

	</div><!-- /.wrapper -->
</body>
</html>