<h2 class="title">新加用户</h2>

<form action="<?php echo site_url('admin/user/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="user_name">用户名:</label>
				<p><input type="text" value="<?php echo isset($user_name) ? $user_name : ''; ?>"  name="user_name"></p>
			</li>
			<li>
				<label for="password">密码:</label>
				<p><input type="password" value=""  name="password"></p>
			</li>
			<li>
				<label for="email">Email:</label>
				<p><input type="text" value="<?php echo isset($email) ? $email : ''; ?>"  name="email"></p>
			</li>
			<li class="off">
				<label>分组:</label>
				<p><?php template_select($group_list, 'group_name', '', 'group_id', '请选择'); ?></p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>