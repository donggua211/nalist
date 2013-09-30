<div class="docs form">
<?php echo $this->Form->create('Doc'); ?>
	<fieldset>
		<legend><?php echo __('Add Doc'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('DocCat');
		echo $this->Form->input('Feature');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Docs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Doc Cats'), array('controller' => 'doc_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doc Cat'), array('controller' => 'doc_cats', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
	</ul>
</div>
