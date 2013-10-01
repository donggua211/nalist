<div class="docCats index">
	<h2><?php echo __('Doc Cats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th>name</th>
		<th>description</th>
		<th>created</th>
		<th>modified</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php echo $this->Cat->listDocCats($docCats, $docCatsTree); ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Doc Cat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Docs'), array('controller' => 'docs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doc'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
	</ul>
</div>
