<div class="infoFilters index">
	<h2><?php echo __('Info Filters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('info_id'); ?></th>
			<th><?php echo $this->Paginator->sort('filter_id'); ?></th>
			<th><?php echo $this->Paginator->sort('value'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($infoFilters as $infoFilter): ?>
	<tr>
		<td><?php echo h($infoFilter['InfoFilter']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($infoFilter['Info']['title'], array('controller' => 'infos', 'action' => 'view', $infoFilter['Info']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($infoFilter['Filter']['title'], array('controller' => 'filters', 'action' => 'view', $infoFilter['Filter']['id'])); ?>
		</td>
		<td><?php echo h($infoFilter['InfoFilter']['value']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $infoFilter['InfoFilter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $infoFilter['InfoFilter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $infoFilter['InfoFilter']['id']), null, __('Are you sure you want to delete # %s?', $infoFilter['InfoFilter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Info Filter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
