<?php $this->Html->addCrumb('Files', array('controller' => 'docs', 'action' => 'index'));?>
<?php $this->Html->addCrumb($doc['Doc']['name']);?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title"><?php echo h($doc['Doc']['name']); ?></h3>
	</div>
	<div class="box-body">
		<ul class="repolist js-repo-list" data-filterable-for="your-repos-filter" data-filterable-type="substring">
			<li class="public source clearfix"><div class="title"><?php echo __('Id'); ?>: </div><div class="content"><?php echo h($doc['Doc']['id']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Name'); ?>: </div><div class="content"><?php echo h($doc['Doc']['name']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Description'); ?>: </div><div class="content"><?php echo h($doc['Doc']['description']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Created'); ?>: </div><div class="content"><?php echo h($doc['Doc']['created']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Modified'); ?>: </div><div class="content"><?php echo h($doc['Doc']['modified']); ?></div></li>
			<li class="public source clearfix">
				<div class="title"><?php echo __('Category'); ?>: </div>
				<div class="content">
					<ul class="category">
					<?php foreach ($doc['DocCat'] as $docCat): ?>
						<li><?php echo $this->Html->link(h($docCat['name']), array('controller' => 'doc_cats', 'action' => 'view', $docCat['id'])); ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Related Features</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php foreach ($doc['Feature'] as $feature): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($feature['name']), array('controller' => 'features', 'action' => 'view', $feature['id'])); ?></td>
				<td class="message"><?php echo $feature['description']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>
