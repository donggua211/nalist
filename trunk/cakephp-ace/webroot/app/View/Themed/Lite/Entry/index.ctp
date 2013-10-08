<!-- POPULAR REPOSITORIES -->
<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Files</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($docs as $doc): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($doc['Doc']['name']), array('action' => 'view', $doc['Doc']['id'])); ?></td>
				<td class="message"><?php echo h($doc['Doc']['description']); ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doc['Doc']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doc['Doc']['id']), null, __('Are you sure you want to delete # %s?', $doc['Doc']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			</table>
	</div>
</div>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Functions</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>descrition</th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			<?php foreach ($features as $feature): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($feature['Feature']['name']), array('action' => 'view', $feature['Feature']['id'])); ?>&nbsp;</td>
				<td class="message"><?php echo h($feature['Feature']['descrition']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $feature['Feature']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $feature['Feature']['id']), null, __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
			</table>
	</div>
</div>