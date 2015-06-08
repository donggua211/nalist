<h2 class="title">编辑信息</h2>

<form action="<?php echo site_url('admin/info/edit'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="title">Title:</label>
				<p><input type="text" value="<?php echo isset($title) ? $title : ''; ?>"  name="title"></p>
			</li>
			<li>
				<label for="area_id">Area:</label>
				<p><?php template_tree_select($area_list, 'area_name', $area_id, 'area_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="user_id">User:</label>
				<p><?php template_select($user_list, 'user_name', $user_id, 'user_id', '请选择'); ?></p>
			</li>
			<li class="textarea">
				<label for="description">Description:</label>
				<p><textarea name="description"><?php echo isset($description) ? $description : ''; ?></textarea></p>
			</li>
			<li class="off">
				<label for="status">Status:</label>
				<p>
					<input type="radio" <?php echo ($status == '1') ? 'CHECKED' : ''; ?> value="1"  name="status">Active 
					<input type="radio" <?php echo ($status == '0') ? 'CHECKED' : ''; ?> value="0" name="status">Inactive
				</p>
			</li>
		</ul>
		
		<h2 class="sub-title">Filter Options</h2>
		<ul class="auto-height">
			<?php foreach($filter_list as $val): ?>
			
			<li class="long-line">
				<label for="user_id"><?php echo $val['filter_name']; ?>:</label>
				<p>
				<?php
				switch($val['type']) {
					case 'select':
						echo '<select name="options['.$val['id'].']" >';
						foreach($val['options'] as $option) {
							echo '<option value="'.$option['option_value'].'" '.(isset($filters[$val['id']]) && $filters[$val['id']] == $option['option_value'] ? 'SELECTED' : '').' > '.$option['option_name'];
						}
						echo '</select>';
						break;
					case 'radio':
					case 'checkbox':
						foreach($val['options'] as $option) {
							$option_name = 'options['.$val['id'].']';
							if($val['type'] == 'checkbox') {
								$option_name .= '[]';
							}
							
							$checked = false;
							if(isset($filters[$val['id']]) && !empty($filters[$val['id']])) {
								if($val['type'] == 'checkbox') {
									if(!is_array($filters[$val['id']])) {
										$filters[$val['id']] = (array)$filters[$val['id']];
									}
									
									if(in_array($option['option_value'], $filters[$val['id']])) {
										$checked = true;
									}
								} else {
									if($filters[$val['id']] == $option['option_value']) {
										$checked = true;
									}
								}
							}
							
							echo '<input type="'.$val['type'].'" name="'.$option_name.'" value="'.$option['option_value'].'" '.($checked ? 'CHECKED' : '').'> '.$option['option_name'].' ';
						}
						break;
					case 'text':
					case 'number':
					default:
						echo '<input type="'.$val['type'].'" name="options['.$val['id'].']" value="'.(isset($filters[$val['id']]) ? $filters[$val['id']] : '').'" >';
						break;
				}
				?>
				</p>
			</li>
			<?php endforeach; ?>
		</ul>
		
		<h2 class="sub-title">Mets</h2>
		<ul class="auto-height">
			<?php foreach($meta_list as $val): ?>
			<li class="long-line">
				<label for="user_id"><?php echo $val['meta_name']; ?>:</label>
				<p><input type="text" name="meta[<?php echo $val['id']; ?>]" value="<?php echo (isset($meta[$val['id']]) ? $meta[$val['id']] : ''); ?>" ></p>
			</li>
			<?php endforeach; ?>
		</ul>
		
		<ul>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　编辑　" name="submit" class="submit-button">
				<input type="submit" value="　删除　" name="remove" class="submit-button">
			</li>
			</li>
		</ul>
	</div>
	<input type="hidden" value="<?php echo $id; ?>" name="id">
</form>