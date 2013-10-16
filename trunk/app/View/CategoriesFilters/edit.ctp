<div class="categoriesFilters form">
<?php echo $this->Form->create('CategoriesFilter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categories Filter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('filter_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CategoriesFilter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('CategoriesFilter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Categories Filters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
