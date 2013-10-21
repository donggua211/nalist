<div class="infos index">
	<h2><?php echo __('Infos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('area_id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($infos as $info): ?>
	<tr>
		<td><?php echo h($info['Info']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($info['Area']['id'], array('controller' => 'areas', 'action' => 'view', $info['Area']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($info['Category']['name'], array('controller' => 'categories', 'action' => 'view', $info['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($info['User']['id'], array('controller' => 'users', 'action' => 'view', $info['User']['id'])); ?>
		</td>
		<td><?php echo h($info['Info']['title']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['description']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['status']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['created']); ?>&nbsp;</td>
		<td><?php echo h($info['Info']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $info['Info']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $info['Info']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $info['Info']['id']), null, __('Are you sure you want to delete # %s?', $info['Info']['id'])); ?>
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