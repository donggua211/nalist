<h2 class="title">新加信息</h2>

<form action="<?php echo site_url('admin/info/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="title">Title:</label>
				<p><input type="text" value="<?php echo isset($title) ? $title : ''; ?>"  name="title"></p>
			</li>
			<li>
				<label for="category_id">Category:</label>
				<p><?php template_tree_select($category_list, 'category_name', '', 'category_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="area_id">Area:</label>
				<p><?php template_tree_select($area_list, 'area_name', '', 'area_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="user_id">User:</label>
				<p><?php template_select($user_list, 'user_name', '', 'user_id', '请选择'); ?></p>
			</li>
			<li class="textarea">
				<label for="description">Description:</label>
				<p><textarea name="description"><?php echo isset($description) ? $description : ''; ?></textarea></p>
			</li>
			<li class="off">
				<label for="status">Status:</label>
				<p>
					<input type="radio" <?php echo (!isset($status) || $status == '1') ? 'CHECKED' : ''; ?> value="1"  name="status">Active 
					<input type="radio" <?php echo (isset($status) && $status == '0') ? 'CHECKED' : ''; ?> value="0" name="status">Inactive
				</p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>