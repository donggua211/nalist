<div class="groups form">
<?php echo $this->Form->create('Group'); ?>
	<fieldset>
		<legend><?php echo __('Edit Group'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('group_name');
		echo $this->Form->input('permission');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>