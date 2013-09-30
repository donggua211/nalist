<div class="docCats index">
	<h2><?php echo __('Doc Cats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($docCats as $docCat): ?>
	<tr>
		<td><?php echo h($docCat['DocCat']['id']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['name']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['description']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['created']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $docCat['DocCat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $docCat['DocCat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $docCat['DocCat']['id']), null, __('Are you sure you want to delete # %s?', $docCat['DocCat']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Doc Cat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Docs'), array('controller' => 'docs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doc'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
	</ul>
</div>
