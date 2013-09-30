<div class="featureCats form">
<?php echo $this->Form->create('FeatureCat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Feature Cat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('Feature');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FeatureCat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FeatureCat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Feature Cats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
	</ul>
</div>
