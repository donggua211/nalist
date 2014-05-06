<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __('Add Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('cat_slug');
		echo $this->Form->input('description');
		echo $this->Form->input('parent_id', array(
			'options' => $categoriesList,
			'empty' => 'Set as top'
		));
		echo $this->Form->input('Filter');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>