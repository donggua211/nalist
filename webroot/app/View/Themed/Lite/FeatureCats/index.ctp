<?php $this->Html->addCrumb('Function Categories', array('controller' => 'doc_cats', 'action' => 'index'));?>
<?php $this->Html->addCrumb('List');?>

<div class="box box-small">
	<div class="box-header">
		<h3 class="box-title">Function Categories</h3>
	</div>
	<div class="box-body">
		<table class="files">
			<tr>
				<th>name</th>
				<th>description</th>
			</tr>
			<?php echo $this->Cat->listFeatureCats($featureCats); ?>
		</table>
	</div>
</div>