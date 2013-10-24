<div class="filters index">
	<h2><?php echo __('Filters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('key'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('rule'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($filters as $filter): ?>
	<tr>
		<td><?php echo h($filter['Filter']['id']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['key']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['title']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['type']); ?>&nbsp;</td>
		<td><?php echo h($filter['Filter']['rule']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $filter['Filter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $filter['Filter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $filter['Filter']['id']), null, __('Are you sure you want to delete # %s?', $filter['Filter']['id'])); ?>
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