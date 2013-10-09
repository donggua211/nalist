<?php $this->Html->addCrumb('File Categories', array('controller' => 'doc_cats', 'action' => 'index'));?>
<?php $this->Html->addCrumb('List');?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">File Categories</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php echo $this->Cat->listDocCats($docCats); ?>
		</table>
	</div>
</div>