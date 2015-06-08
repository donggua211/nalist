<h2 class="title">新加分组</h2>

<form action="<?php echo site_url('admin/meta/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="meta_name">Meta名称:</label>
				<p><input type="text" value="<?php echo isset($meta_name) ? $meta_name : ''; ?>"  name="meta_name"></p>
			</li>
			<li>
				<label for="category">分类:</label>
				<p><?php template_tree_select($category_list, 'category_display_name', '', 'category_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="meta_slug">Meta Key:</label>
				<p><input type="text" value="<?php echo isset($meta_slug) ? $meta_slug : ''; ?>"  name="meta_slug"></p>
			</li>
			<li>
				<label>表示顺序:</label>
				<p><input type="text" value="<?php echo isset($display_order) ? $display_order : '100'; ?>"  name="display_order"></p>
			</li>
		</ul>
		
		<ul>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>