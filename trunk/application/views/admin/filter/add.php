<h2 class="title">新加分组</h2>

<form action="<?php echo site_url('admin/filter/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="filter_name">过滤器名称:</label>
				<p><input type="text" value="<?php echo isset($filter_name) ? $filter_name : ''; ?>"  name="filter_name"></p>
			</li>
			<li>
				<label for="filter_key">分类:</label>
				<p><?php template_tree_select($category_list, 'category_name', '', 'category_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="filter_key">过滤器Key:</label>
				<p><input type="text" value="<?php echo isset($filter_key) ? $filter_key : ''; ?>"  name="filter_key"></p>
			</li>
			<li>
				<label for="type">过滤器Type:</label>
				<p><input type="text" value="<?php echo isset($type) ? $type : ''; ?>"  name="type"></p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>