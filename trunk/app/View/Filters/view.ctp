<div class="filters view">
<h2><?php echo __('Filter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rule'); ?></dt>
		<dd>
			<?php echo h($filter['Filter']['rule']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Filter'), array('action' => 'edit', $filter['Filter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Filter'), array('action' => 'delete', $filter['Filter']['id']), null, __('Are you sure you want to delete # %s?', $filter['Filter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filter Options'), array('controller' => 'filter_options', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Option'), array('controller' => 'filter_options', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Filter Options'); ?></h3>
	<?php if (!empty($filter['FilterOption'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Filter Id'); ?></th>
		<th><?php echo __('Key'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($filter['FilterOption'] as $filterOption): ?>
		<tr>
			<td><?php echo $filterOption['id']; ?></td>
			<td><?php echo $filterOption['filter_id']; ?></td>
			<td><?php echo $filterOption['key']; ?></td>
			<td><?php echo $filterOption['value']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'filter_options', 'action' => 'view', $filterOption['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'filter_options', 'action' => 'edit', $filterOption['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'filter_options', 'action' => 'delete', $filterOption['id']), null, __('Are you sure you want to delete # %s?', $filterOption['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Filter Option'), array('controller' => 'filter_options', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($filter['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Parentid'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($filter['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['name']; ?></td>
			<td><?php echo $category['description']; ?></td>
			<td><?php echo $category['parentid']; ?></td>
			<td><?php echo $category['lft']; ?></td>
			<td><?php echo $category['rght']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Infos'); ?></h3>
	<?php if (!empty($filter['Info'])): ?>
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
	<?php foreach ($filter['Info'] as $info): ?>
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
