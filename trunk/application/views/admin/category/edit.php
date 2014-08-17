<h2 class="title">编辑分类</h2>

<form action="<?php echo site_url('admin/category/edit'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="bangumiid">分类名称:</label>
				<p><input type="text" value="<?php echo isset($category_name) ? $category_name : ''; ?>"  name="category_name"></p>
			</li>
			<li>
				<label for="bangumiid">分类 Slug:</label>
				<p><input type="text" value="<?php echo isset($category_slug) ? $category_slug : ''; ?>"  name="category_slug"></p>
			</li>
			<li>
				<label>父级:</label>
				<p><?php template_tree_select($category_list, 'category_name', $parent_id, '无'); ?></p>
			</li>
			<li class="textarea off">
				<label>简介:</label>
				<p><textarea name="description"><?php echo isset($description) ? $description : ''; ?></textarea></p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　编辑　" name="submit" class="submit-button">
				<input type="submit" value="　删除　" name="remove" class="submit-button">
			</li>
		</ul>
	</div>
	<input type="hidden" value="<?php echo $id; ?>" name="id">
</form>