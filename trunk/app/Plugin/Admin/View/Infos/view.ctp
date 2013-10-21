<div class="infos view">
<h2><?php echo __('Info'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($info['Info']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($info['Area']['id'], array('controller' => 'areas', 'action' => 'view', $info['Area']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($info['Category']['name'], array('controller' => 'categories', 'action' => 'view', $info['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($info['User']['id'], array('controller' => 'users', 'action' => 'view', $info['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($info['Info']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($info['Info']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($info['Info']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($info['Info']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($info['Info']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Filters'); ?></h3>
	<?php if (!empty($info['Filter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Rule'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($info['Filter'] as $filter): ?>
		<tr>
			<td><?php echo $filter['id']; ?></td>
			<td><?php echo $filter['key']; ?></td>
			<td><?php echo $filter['title']; ?></td>
			<td><?php echo $filter['type']; ?></td>
			<td><?php echo $filter['rule']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'filters', 'action' => 'view', $filter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'filters', 'action' => 'edit', $filter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'filters', 'action' => 'delete', $filter['id']), null, __('Are you sure you want to delete # %s?', $filter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
