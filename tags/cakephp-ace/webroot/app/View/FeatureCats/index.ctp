<div class="featureCats index">
	<h2><?php echo __('Feature Cats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th>name</th>
		<th>description</th>
		<th>created</th>
		<th>modified</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php echo $this->Cat->listFeatureCats($featureCats); ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Feature Cat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Features'), array('controller' => 'features', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Feature'), array('controller' => 'features', 'action' => 'add')); ?> </li>
	</ul>
</div>
