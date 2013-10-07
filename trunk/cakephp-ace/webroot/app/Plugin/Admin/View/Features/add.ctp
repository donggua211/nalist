<div class="features form">
<?php echo $this->Form->create('Feature'); ?>
	<fieldset>
		<legend><?php echo __('Add Feature'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('descrition');
		echo $this->Form->input('Doc');
		echo $this->Form->input('FeatureCat');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>