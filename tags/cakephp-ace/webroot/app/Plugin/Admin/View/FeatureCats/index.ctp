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
