<div class="filters form">
<?php echo $this->Form->create('Filter'); ?>
	<fieldset>
		<legend><?php echo __('Add Filter'); ?></legend>
	<?php
		echo $this->Form->input('key');
		echo $this->Form->input('title');
		echo $this->Form->input('type');
		echo $this->Form->input('rule');
		echo $this->Form->input('Category');
		echo $this->Form->input('Info');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>