<h2 class="title">新加分组</h2>

<form action="<?php echo site_url('admin/filter/add'); ?>" method="POST">
	<div class="edit-form main-content">
		<ul>
			<li>
				<label for="filter_name">过滤器名称:</label>
				<p><input type="text" value="<?php echo isset($filter_name) ? $filter_name : ''; ?>"  name="filter_name"></p>
			</li>
			<li>
				<label for="filter_key">分类:</label>
				<p><?php template_tree_select($category_list, 'category_display_name', '', 'category_id', '请选择'); ?></p>
			</li>
			<li>
				<label for="filter_key">过滤器Key:</label>
				<p><input type="text" value="<?php echo isset($filter_key) ? $filter_key : ''; ?>"  name="filter_key"></p>
			</li>
			<li class="off">
				<label for="type">过滤器Type:</label>
				<p><?php template_select(text_filter_type(), FALSE, '', 'type', '请选择'); ?></p>
			</li>
		</ul>
		
		<div class="filter-option-wrap">
			<div class="filter-option-subtitle">
				<span>Options</span>
				<div class="filter-option-button"><a class="add-option">New</a></div>
			</div>
			<div class="filter-option-list">
				<dl> 
					<dt>Option Name</dt>
					<dd class="list-value">Option Value</dd>
					<dd class="list-value">Display Order</dd>
					<dd class="filter-option-button">Remove</dd>
				</dl>
			</div>
		</div>
		
		<ul>
			<li class="button">
				<span class="label-like">&nbsp;</span>
				<input type="submit" value="　添加　"  name="submit" class="submit-button">
			</li>
		</ul>
	</div>
</form>


<script type="text/javascript">
	//ready function
	$(document).ready(function(){
		$( ".add-option" ).click(function() {
			var html = '<dl><dt><input name="option_name[]" type="text"></dt><dd class="list-value"><input name="option_value[]" type="text"></dd><dd class="list-value"><input name="display_order[]" type="text" value="100"></dd><dd class="filter-option-button"><a class="remove-option" onClick="return remove_option(this);" id="">remove</a></dd></dl>';
			
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