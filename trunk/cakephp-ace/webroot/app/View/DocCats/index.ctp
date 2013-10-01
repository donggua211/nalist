<?php pr($docCats);?>
<div class="docCats index">
	<h2><?php echo __('Doc Cats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>created</th>
			<th>modified</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($docCats as $docCat): ?>
	<tr>
		<td><?php echo h($docCat['DocCat']['id']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['name']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['description']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['created']); ?>&nbsp;</td>
		<td><?php echo h($docCat['DocCat']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $docCat['DocCat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $docCat['DocCat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $docCat['DocCat']['id']), null, __('Are you sure you want to delete # %s?', $docCat['DocCat']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
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
