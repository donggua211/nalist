<h2 class="title">修改密码</h2>

<form action="<?php echo site_url('admin/admin_user/password'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="password">旧密码</label>
				<p><input name="password" type="text" value="" /></p>
			</li>
			<li>
				<label for="password_new">新密码</label>
				<p><input name="password_new" type="text" value="" /></p>
			</li>
			<li class="off">
				<label for="password_new_c">新密码(确定)</label>
				<p><input name="password_new_c" type="text" value="" /></p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" name="submit" value="修改密码" class="submit-button" />
			</li>
		</ul>
	</div>
</form>