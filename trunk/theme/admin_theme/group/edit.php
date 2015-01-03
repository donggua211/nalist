<h2 class="title">编辑分组</h2>

<form action="<?php echo site_url('admin/group/edit'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="group_name">分组名:</label>
				<p><input type="text" value="<?php echo isset($group_name) ? $group_name : ''; ?>"  name="group_name"></p>
			</li>
			<li>
				<label for="permission">权限:</label>
				<p><input type="text" value="<?php echo isset($permission) ? $permission : ''; ?>"  name="permission"></p>
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