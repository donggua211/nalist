<div class="areas form">
<?php echo $this->Form->create('Area'); ?>
	<fieldset>
		<legend><?php echo __('Add Area'); ?></legend>
	<?php
		echo $this->Form->input('areaname');
		echo $this->Form->input('parentid');
		echo $this->Form->input('orderid');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>