<h2 class="title">编辑城市</h2>

<form action="<?php echo site_url('admin/area/edit'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="area_name">城市名称:</label>
				<p><input type="text" value="<?php echo isset($area_name) ? $area_name : ''; ?>"  name="area_name"></p>
			</li>
			<li>
				<label for="area_display_name">城市显示名称:</label>
				<p><input type="text" value="<?php echo isset($area_display_name) ? $area_display_name : ''; ?>"  name="area_display_name"></p>
			</li>
			<li>
				<label for="area_slug">城市Slug:</label>
				<p><?php echo isset($area_slug) ? $area_slug : ''; ?></p>
			</li>
			<li>
				<label>父级:</label>
				<p><?php template_tree_select($area_list, 'area_name', $parent_id, 'parent_id', '无'); ?></p>
			</li>
			<li>
				<label>城市的种类:</label>
				<p>
					<select name="type">
						<option value="state" <?php echo (isset($type) && $type == 'state') ? 'SELECTED' : ''; ?> >state</option>
						<option value="county" <?php echo (isset($type) && $type == 'county') ? 'SELECTED' : ''; ?> >county</option>
						<option value="city" <?php echo (isset($type) && $type == 'city') ? 'SELECTED' : ''; ?> >city</option>
						<option value="town" <?php echo (isset($type) && $type == 'town') ? 'SELECTED' : ''; ?> >town</option>
					</select>
				</p>
			</li>
			<li class="off">
				<label>表示顺序:</label>
				<p><input type="text" value="<?php echo isset($display_order) ? $display_order : '100'; ?>"  name="display_order"></p>
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