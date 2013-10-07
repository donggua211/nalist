<div class="docs form">
<?php echo $this->Form->create('Doc'); ?>
	<fieldset>
		<legend><?php echo __('Add Doc'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('DocCat');
		echo $this->Form->input('Feature');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>