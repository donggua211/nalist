<div class="categoriesFilters index">
	<h2><?php echo __('Categories Filters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('filter_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesFilters as $categoriesFilter): ?>
	<tr>
		<td><?php echo h($categoriesFilter['CategoriesFilter']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriesFilter['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesFilter['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesFilter['Filter']['title'], array('controller' => 'filters', 'action' => 'view', $categoriesFilter['Filter']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriesFilter['CategoriesFilter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriesFilter['CategoriesFilter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriesFilter['CategoriesFilter']['id']), null, __('Are you sure you want to delete # %s?', $categoriesFilter['CategoriesFilter']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Categories Filter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
