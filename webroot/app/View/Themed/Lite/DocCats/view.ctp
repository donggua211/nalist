<?php $this->Html->addCrumb('File Categories', array('controller' => 'doc_cats', 'action' => 'index'));?>
<?php $this->Html->addCrumb($docCat['DocCat']['name']);?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title"><?php echo h($docCat['DocCat']['name']); ?></h3>
	</div>
	<div class="box-body">
		<ul class="repolist js-repo-list" data-filterable-for="your-repos-filter" data-filterable-type="substring">
			<li class="public source clearfix"><div class="title"><?php echo __('Id'); ?>: </div><div class="content"><?php echo h($docCat['DocCat']['id']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Name'); ?>: </div><div class="content"><?php echo h($docCat['DocCat']['name']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Description'); ?>: </div><div class="content"><?php echo h($docCat['DocCat']['description']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Created'); ?>: </div><div class="content"><?php echo h($docCat['DocCat']['created']); ?></div></li>
			<li class="public source clearfix"><div class="title"><?php echo __('Modified'); ?>: </div><div class="content"><?php echo h($docCat['DocCat']['modified']); ?></div></li>
		</ul>
	</div>
</div>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Files</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php foreach ($docCat['Doc'] as $doc): ?>
			<tr>
				<td class="content"><?php echo $this->Html->link(h($doc['name']), array('controller' => 'docs', 'action' => 'view', $doc['id'])); ?></td>
				<td class="message"><?php echo $doc['description']; ?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>
