<div class="infos form">
<?php echo $this->Form->create('Info'); ?>
	<fieldset>
		<legend><?php echo __('Edit Info'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('area_id', array(
			'options' => $areas
		));
		echo $this->Form->input('category_id', array(
			'options' => $categories
		));
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('status');
		echo $this->Form->input('Filter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>