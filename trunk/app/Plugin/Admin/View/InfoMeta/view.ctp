<div class="infoMeta view">
<h2><?php echo __('Info Metum'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($infoMetum['InfoMetum']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Info'); ?></dt>
		<dd>
			<?php echo $this->Html->link($infoMetum['Info']['title'], array('controller' => 'infos', 'action' => 'view', $infoMetum['Info']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Key'); ?></dt>
		<dd>
			<?php echo h($infoMetum['InfoMetum']['meta_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Value'); ?></dt>
		<dd>
			<?php echo h($infoMetum['InfoMetum']['meta_value']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Info Metum'), array('action' => 'edit', $infoMetum['InfoMetum']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Info Metum'), array('action' => 'delete', $infoMetum['InfoMetum']['id']), null, __('Are you sure you want to delete # %s?', $infoMetum['InfoMetum']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Info Meta'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info Metum'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
