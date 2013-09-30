<div class="features view">
<h2><?php echo __('Feature'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($feature['Feature']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($feature['Feature']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descrition'); ?></dt>
		<dd>
			<?php echo h($feature['Feature']['descrition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($feature['Feature']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($feature['Feature']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Feature'), array('action' => 'edit', $feature['Feature']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Feature'), array('action' => 'delete', $feature['Feature']['id']), null, __('Are you sure you want to delete # %s?', $feature['Feature']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Features'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Docs'), array('controller' => 'docs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doc'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Feature Cats'), array('controller' => 'feature_cats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature Cat'), array('controller' => 'feature_cats', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Docs'); ?></h3>
	<?php if (!empty($feature['Doc'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($feature['Doc'] as $doc): ?>
		<tr>
			<td><?php echo $doc['id']; ?></td>
			<td><?php echo $doc['name']; ?></td>
			<td><?php echo $doc['description']; ?></td>
			<td><?php echo $doc['created']; ?></td>
			<td><?php echo $doc['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'docs', 'action' => 'view', $doc['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'docs', 'action' => 'edit', $doc['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'docs', 'action' => 'delete', $doc['id']), null, __('Are you sure you want to delete # %s?', $doc['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Doc'), array('controller' => 'docs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Feature Cats'); ?></h3>
	<?php if (!empty($feature['FeatureCat'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($feature['FeatureCat'] as $featureCat): ?>
		<tr>
			<td><?php echo $featureCat['id']; ?></td>
			<td><?php echo $featureCat['name']; ?></td>
			<td><?php echo $featureCat['description']; ?></td>
			<td><?php echo $featureCat['created']; ?></td>
			<td><?php echo $featureCat['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'feature_cats', 'action' => 'view', $featureCat['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'feature_cats', 'action' => 'edit', $featureCat['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'feature_cats', 'action' => 'delete', $featureCat['id']), null, __('Are you sure you want to delete # %s?', $featureCat['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Feature Cat'), array('controller' => 'feature_cats', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
