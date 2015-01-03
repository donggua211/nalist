<h2 class="title">新加分组</h2>

<form action="<?php echo site_url('admin/group/add'); ?>" method="POST">
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
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>