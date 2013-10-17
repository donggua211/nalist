<div class="filters form">
<?php echo $this->Form->create('Filter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Filter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key');
		echo $this->Form->input('title');
		echo $this->Form->input('type');
		echo $this->Form->input('rule');
		echo $this->Form->input('Category');
		echo $this->Form->input('Info');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Filter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Filter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Filters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Filter Options'), array('controller' => 'filter_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Option'), array('controller' => 'filter_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
