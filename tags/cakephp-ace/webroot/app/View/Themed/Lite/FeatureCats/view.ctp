<?php $this->Html->addCrumb('Function Categories', array('controller' => 'feature_cats', 'action' => 'index'));?>
<?php $this->Html->addCrumb($featureCat['FeatureCat']['name']);?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title"><?php echo h($featureCat['FeatureCat']['name']); ?></h3>
	</div>
	<div class="box-body">
		<ul class="repolist js-repo-list" data-filterable-for="your-repos-filter" data-filterable-type="substring">
			<li class="public source clearfix"><div class="title"><?php echo __('Id'); ?>: </div><div class="content"><?php echo h($featureCat['FeatureCat']['id']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Name'); ?>: </div><div class="content"><?php echo h($featureCat['FeatureCat']['name']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Description'); ?>: </div><div class="content"><?php echo h($featureCat['FeatureCat']['description']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Created'); ?>: </div><div class="content"><?php echo h($featureCat['FeatureCat']['created']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Modified'); ?>: </div><div class="content"><?php echo h($featureCat['FeatureCat']['modified']); ?></div></li>
		</ul>
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
				<th>description</th>
			</tr>
			<?php foreach ($featureCat['Feature'] as $feature): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($feature['name']), array('controller' => 'docs', 'action' => 'view', $feature['id'])); ?></td>
				<td class="message"><?php echo $feature['description']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>