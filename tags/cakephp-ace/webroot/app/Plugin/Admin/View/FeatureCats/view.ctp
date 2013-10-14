<div class="featureCats view">
<h2><?php echo __('Feature Cat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($featureCat['FeatureCat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($featureCat['FeatureCat']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($featureCat['FeatureCat']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($featureCat['FeatureCat']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($featureCat['FeatureCat']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Features'); ?></h3>
	<?php if (!empty($featureCat['Feature'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($featureCat['Feature'] as $feature): ?>
		<tr>
			<td><?php echo $feature['id']; ?></td>
			<td><?php echo $feature['name']; ?></td>
			<td><?php echo $feature['description']; ?></td>
			<td><?php echo $feature['created']; ?></td>
			<td><?php echo $feature['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'features', 'action' => 'view', $feature['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'features', 'action' => 'edit', $feature['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'features', 'action' => 'delete', $feature['id']), null, __('Are you sure you want to delete # %s?', $feature['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
