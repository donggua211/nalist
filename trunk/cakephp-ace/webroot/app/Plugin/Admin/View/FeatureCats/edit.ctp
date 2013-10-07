<div class="featureCats form">
<?php echo $this->Form->create('FeatureCat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Feature Cat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('Feature');
		echo $this->Form->input('parent_id', array(
			'options' => $featureCatsList,
			'empty' => 'Set as top'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
