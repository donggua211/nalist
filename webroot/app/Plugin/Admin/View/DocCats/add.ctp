<div class="docCats form">
<?php echo $this->Form->create('DocCat'); ?>
	<fieldset>
		<legend><?php echo __('Add Doc Cat'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('dir');
		echo $this->Form->input('Doc');
		echo $this->Form->input('parent_id', array(
			'options' => $docCatsList,
			'empty' => 'Set as top'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>