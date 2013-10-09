<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Files</h3>
		<div class="tabnav-right">
			<span class="user-following-container tabnav-widget">
				<span class="follow">
					<?php echo $this->Html->link('More', array('controller' => 'docs', 'action' => 'index'), array('class' => 'minibutton')); ?>
				</span>
			</span>
		</div>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php foreach ($docs as $doc): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($doc['Doc']['name']), array('controller' => 'docs', 'action' => 'view', $doc['Doc']['id'])); ?></td>
				<td class="message"><?php echo h($doc['Doc']['description']); ?></td>
			</tr>
		<?php endforeach; ?>
			<tr>
				<td colspan="2">
					<p>
					<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'),
					'model' => 'Doc',
					));
					?>	</p>
					<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array('model' => 'Doc',), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ' ', 'model' => 'Doc',));
						echo $this->Paginator->next(__('next') . ' >', array('model' => 'Doc',), null, array('class' => 'next disabled'));
					?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Functions</h3>
		<div class="tabnav-right">
			<span class="user-following-container tabnav-widget">
				<span class="follow">
					<?php echo $this->Html->link('More', array('controller' => 'features', 'action' => 'index'), array('class' => 'minibutton')); ?>
				</span>
			</span>
		</div>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php foreach ($features as $feature): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($feature['Feature']['name']), array('controller' => 'features', 'action' => 'view', $feature['Feature']['id'])); ?>&nbsp;</td>
				<td class="message"><?php echo h($feature['Feature']['description']); ?>&nbsp;</td>
			</tr>
		<?php endforeach; ?>
			<tr>
				<td colspan="2">
					<p>
					<?php
					echo $this->Paginator->counter(array(
					'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'),
					'model' => 'Feature',
					));
					?>	</p>
					<div class="paging">
					<?php
						echo $this->Paginator->prev('< ' . __('previous'), array('model' => 'Feature',), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => '', 'model' => 'Feature',));
						echo $this->Paginator->next(__('next') . ' >', array('model' => 'Feature',), null, array('class' => 'next disabled'));
					?>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>