<div class="featureCats index">
	<h2><?php echo __('Feature Cats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($featureCats as $featureCat): ?>
	<tr>
		<td><?php echo h($featureCat['FeatureCat']['id']); ?>&nbsp;</td>
		<td><?php echo h($featureCat['FeatureCat']['name']); ?>&nbsp;</td>
		<td><?php echo h($featureCat['FeatureCat']['description']); ?>&nbsp;</td>
		<td><?php echo h($featureCat['FeatureCat']['created']); ?>&nbsp;</td>
		<td><?php echo h($featureCat['FeatureCat']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $featureCat['FeatureCat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $featureCat['FeatureCat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $featureCat['FeatureCat']['id']), null, __('Are you sure you want to delete # %s?', $featureCat['FeatureCat']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Feature Cat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
	</ul>
</div>
