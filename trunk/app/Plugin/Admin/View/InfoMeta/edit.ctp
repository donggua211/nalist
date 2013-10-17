<div class="infoMeta form">
<?php echo $this->Form->create('InfoMetum'); ?>
	<fieldset>
		<legend><?php echo __('Edit Info Metum'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('info_id');
		echo $this->Form->input('meta_key');
		echo $this->Form->input('meta_value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('InfoMetum.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('InfoMetum.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Info Meta'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Infos'), array('controller' => 'infos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Info'), array('controller' => 'infos', 'action' => 'add')); ?> </li>
	</ul>
</div>
