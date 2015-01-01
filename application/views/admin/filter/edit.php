<h2 class="title">编辑分组</h2>

<form action="<?php echo site_url('admin/filter/edit'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="filter_name">过滤器名称:</label>
				<p><input type="text" value="<?php echo isset($filter_name) ? $filter_name : ''; ?>"  name="filter_name"></p>
			</li>
			<li>
				<label for="filter_key">分类:</label>
				<p><?php template_tree_select($category_list, 'category_name', $category_id, 'category_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="filter_key">过滤器Key:</label>
				<p><input type="text" value="<?php echo isset($filter_key) ? $filter_key : ''; ?>"  name="filter_key"></p>
			</li>
			<li class="off">
				<label for="type">过滤器Type:</label>
				<p><?php template_select(text_filter_type(), FALSE, $type, 'type', '请选择'); ?></p>
			</li>
		</ul>
		
		<div class="filter-option-wrap">
			<div class="filter-option-subtitle">
				<span>Options</span>
				<div class="filter-option-button"><a class="add-option">New</a></div>
			</div>
			<div class="filter-option-list">
				<?php foreach($option_list as $val): ?>
				<dl> 
					<dt><?php echo $val['option_name']; ?></dt>
					<dd class="list-value"><?php echo $val['option_value']; ?></dd>
					<dd class="filter-option-button"><a id="<?php echo $val['option_id']; ?>" class="remove-option" onClick="return remove_option(this);">remove</a></dd>
				</dl>
				<?php endforeach; ?>
			</div>
		</div>
		
		<ul>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　编辑　" name="submit" class="submit-button">
				<input type="submit" value="　删除　" name="remove" class="submit-button">
			</li>
		</ul>
	</div>
	<input type="hidden" value="<?php echo $id; ?>" name="id">
</form>

<script type="text/javascript">
	//ready function
	$(document).ready(function(){
		$( ".add-option" ).click(function() {
			var html = '<dl><dt><input name="option_name[]" type="text"></dt><dd class="list-value"><input name="option_value[]" type="text"></dd><dd class="filter-option-button"><a class="remove-option" onClick="return remove_option(this);" id="">remove</a></dd></dl>';
			
			$(html).appendTo(".filter-option-list").hide().fadeIn().find('input:first').focus();
			
			return false;
		});
	});
	
	function remove_option(obj) {
		if (window.confirm("Are you sure to remove?")) {
			var option_id = $( obj ).attr('id');
			
			if(option_id != '') {
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('admin/admin_api/filter_remove'); ?>",
					data: { option_id: option_id }
				})
				.done(function( data ) {
					if(data == 'OK') {
						alert('删除成功!');
						$( obj ).closest( "dl" ).remove();
					} else {
						alert('删除失败!');
					}
				});
			} else {
				$( obj ).closest( "dl" ).remove();
			}
		}
		return false;
	};

</script>