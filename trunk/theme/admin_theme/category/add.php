<h2 class="title">新加分类</h2>

<form action="<?php echo site_url('admin/category/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="category_name">分类名称:</label>
				<p><input type="text" value="<?php echo isset($category_name) ? $category_name : ''; ?>"  name="category_name"></p>
			</li>
			<li>
				<label for="category_display_name">分类显示名称:</label>
				<p><input type="text" value="<?php echo isset($category_display_name) ? $category_display_name : ''; ?>"  name="category_display_name"></p>
			</li>
			<li>
				<label>父级:</label>
				<p><?php template_tree_select($category_list, 'category_display_name', '', 'parent_id', '无'); ?></p>
			</li>
			<li>
				<label>表示顺序:</label>
				<p><input type="text" value="<?php echo isset($display_order) ? $display_order : '100'; ?>"  name="display_order"></p>
			</li>
			<li class="textarea off">
				<label>简介:</label>
				<p><textarea name="description"><?php echo isset($description) ? $description : ''; ?></textarea></p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>