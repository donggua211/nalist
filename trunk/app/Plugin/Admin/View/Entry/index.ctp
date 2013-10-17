<div class="docs features index">
	<h2><?php echo __('Docs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>created</th>
			<th>modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($docs as $doc): ?>
	<tr>
		<td><?php echo h($doc['Doc']['id']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['name']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['description']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['created']); ?>&nbsp;</td>
		<td><?php echo h($doc['Doc']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doc['Doc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doc['Doc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doc['Doc']['id']), null, __('Are you sure you want to delete # %s?', $doc['Doc']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<h2><?php echo __('Features'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>created</th>
			<th>modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($features as $feature): ?>
	<tr>
		<td><?php echo h($feature['Feature']['id']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['name']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['description']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['created']); ?>&nbsp;</td>
		<td><?php echo h($feature['Feature']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $feature['Feature']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feature['Feature']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feature['Feature']['id']), null, __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
