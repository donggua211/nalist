<div class="infoFilters view">
<h2><?php echo __('Info Filter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($infoFilter['InfoFilter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($infoFilter['Info']['title'], array('controller' => 'infos', 'action' => 'view', $infoFilter['Info']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($infoFilter['Filter']['title'], array('controller' => 'filters', 'action' => 'view', $infoFilter['Filter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Value'); ?></dt>
		<dd>
			<?php echo h($infoFilter['InfoFilter']['value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Info Filter'), array('action' => 'edit', $infoFilter['InfoFilter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Info Filter'), array('action' => 'delete', $infoFilter['InfoFilter']['id']), null, __('Are you sure you want to delete # %s?', $infoFilter['InfoFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Info Filters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info Filter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Filters'), array('controller' => 'filters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Filter'), array('controller' => 'filters', 'action' => 'add')); ?> </li>
	</ul>
</div>
