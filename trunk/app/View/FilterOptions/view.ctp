<div class="filterOptions view">
<h2><?php echo __('Filter Option'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($filterOption['FilterOption']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($filterOption['Filter']['title'], array('controller' => 'filters', 'action' => 'view', $filterOption['Filter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Key'); ?></dt>
		<dd>
			<?php echo h($filterOption['FilterOption']['key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($filterOption['FilterOption']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Filter Option'), array('action' => 'edit', $filterOption['FilterOption']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Filter Option'), array('action' => 'delete', $filterOption['FilterOption']['id']), null, __('Are you sure you want to delete # %s?', $filterOption['FilterOption']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Filter Options'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter Option'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
