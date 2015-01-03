<h2 class="title">全局设置</h2>

<form action="<?php echo site_url('admin/site_config/index'); ?>" method="POST">
	<div class="edit-form main-content">
		<h2 class="sub-title title-style1">Base 设置</h2>
		<ul>
			<li>
				<label for="site_name">Site Title:</label>
				<p><input type="text" value="<?php echo isset($site_name) ? $site_name : ''; ?>" name="site_name"></p>
			</li>
			<li>
				<label for="site_keyword">Site Keyword:</label>
				<p><input type="text" value="<?php echo isset($site_keyword) ? $site_keyword : ''; ?>" name="site_keyword"></p>
			</li>
			<li class="textarea">
				<label for="site_description">Site Description:</label>
				<p><textarea name="site_description"><?php echo isset($site_description) ? $site_description : ''; ?></textarea></p>
			</li>
		</ul>
		
		<h2 class="sub-title title-style2">Theme 设置</h2>
		<ul>
			<li>
				<label for="site_keyword">Site Theme:</label>
				<p>
					<select name="theme">
						<?php
						foreach($themes as $val)
							echo '<option value="'.$val.'" '.(isset($theme) && $theme == $val ? 'SELECTED' : '' ).'>'.$val.'</option>'
						?>
					</select>
				</p>
			</li>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　编辑　" name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>