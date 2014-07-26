<div class="infoFilters form">
<?php echo $this->Form->create('InfoFilter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Info Filter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('info_id');
		echo $this->Form->input('filter_id');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InfoFilter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InfoFilter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Info Filters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
