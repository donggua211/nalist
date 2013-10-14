<?php $this->Html->addCrumb('Functions', array('controller' => 'features'));?>
<?php $this->Html->addCrumb($feature['Feature']['name']);?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title"><?php echo h($feature['Feature']['name']); ?></h3>
	</div>
	<div class="box-body">
		<ul class="repolist js-repo-list" data-filterable-for="your-repos-filter" data-filterable-type="substring">
			<li class="public source clearfix"><div class="title"><?php echo __('Id'); ?>: </div><div class="content"><?php echo h($feature['Feature']['id']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Name'); ?>: </div><div class="content"><?php echo h($feature['Feature']['name']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Description'); ?>: </div><div class="content"><?php echo h($feature['Feature']['description']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Created'); ?>: </div><div class="content"><?php echo h($feature['Feature']['created']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Modified'); ?>: </div><div class="content"><?php echo h($feature['Feature']['modified']); ?></div></li>
			<li class="public source clearfix">
				<div class="title"><?php echo __('Category'); ?>: </div>
				<div class="content">
					<ul class="category">
					<?php foreach ($feature['FeatureCat'] as $featureCat): ?>
						<li><?php echo $this->Html->link(h($featureCat['name']), array('controller' => 'feature_cats', 'action' => 'view', $featureCat['id'])); ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Related Docs</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php foreach ($feature['Doc'] as $doc): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($doc['name']), array('controller' => 'docs', 'action' => 'view', $doc['id'])); ?></td>
				<td class="message"><?php echo $doc['description']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>
