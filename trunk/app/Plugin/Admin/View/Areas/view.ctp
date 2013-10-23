<div class="areas view">
<h2><?php echo __('Area'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($area['Area']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Areaname'); ?></dt>
		<dd>
			<?php echo h($area['Area']['areaname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent id'); ?></dt>
		<dd>
			<?php echo h($area['Area']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orderid'); ?></dt>
		<dd>
			<?php echo h($area['Area']['orderid']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Infos'); ?></h3>
	<?php if (!empty($area['Info'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($area['Info'] as $info): ?>
		<tr>
			<td><?php echo $info['id']; ?></td>
			<td><?php echo $info['area_id']; ?></td>
			<td><?php echo $info['category_id']; ?></td>
			<td><?php echo $info['user_id']; ?></td>
			<td><?php echo $info['title']; ?></td>
			<td><?php echo $info['description']; ?></td>
			<td><?php echo $info['status']; ?></td>
			<td><?php echo $info['created']; ?></td>
			<td><?php echo $info['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'infos', 'action' => 'view', $info['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'infos', 'action' => 'edit', $info['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'infos', 'action' => 'delete', $info['id']), null, __('Are you sure you want to delete # %s?', $info['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
