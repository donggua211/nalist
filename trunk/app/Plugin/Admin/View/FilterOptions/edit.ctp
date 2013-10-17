<div class="filterOptions form">
<?php echo $this->Form->create('FilterOption'); ?>
	<fieldset>
		<legend><?php echo __('Edit Filter Option'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('filter_id');
		echo $this->Form->input('key');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FilterOption.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FilterOption.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Filter Options'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
