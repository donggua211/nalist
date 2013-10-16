<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parentid'); ?></dt>
		<dd>
			<?php echo h($category['Category']['parentid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Infos'); ?></h3>
	<?php if (!empty($category['Info'])): ?>
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
	<?php foreach ($category['Info'] as $info): ?>
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
<div class="related">
	<h3><?php echo __('Related Filters'); ?></h3>
	<?php if (!empty($category['Filter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Rule'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($category['Filter'] as $filter): ?>
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
