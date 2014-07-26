<div class="areas form">
<?php echo $this->Form->create('Area'); ?>
	<fieldset>
		<legend><?php echo __('Edit Area'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('areaname');
		echo $this->Form->input('type', array('options' => $enumOptions));
		echo $this->Form->input('parent_id', array(
			'options' => $areasList,
			'empty' => 'Set as top'
		));
		echo $this->Form->input('display_order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>