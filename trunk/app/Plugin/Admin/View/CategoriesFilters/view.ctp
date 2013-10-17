<div class="categoriesFilters view">
<h2><?php echo __('Categories Filter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesFilter['CategoriesFilter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesFilter['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesFilter['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesFilter['Filter']['title'], array('controller' => 'filters', 'action' => 'view', $categoriesFilter['Filter']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Filter'), array('action' => 'edit', $categoriesFilter['CategoriesFilter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Filter'), array('action' => 'delete', $categoriesFilter['CategoriesFilter']['id']), null, __('Are you sure you want to delete # %s?', $categoriesFilter['CategoriesFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
