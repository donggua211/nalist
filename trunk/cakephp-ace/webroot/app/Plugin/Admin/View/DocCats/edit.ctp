<div class="docCats form">
<?php echo $this->Form->create('DocCat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Doc Cat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('Doc');
		echo $this->Form->input('parent_id', array(
			'options' => $featureCatsList,
			'empty' => 'Set as top'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DocCat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DocCat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Doc Cats'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Docs'), array('controller' => 'docs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doc'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
	</ul>
</div>