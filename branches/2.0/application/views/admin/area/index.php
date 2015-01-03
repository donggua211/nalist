<h2 class="title">城市列表</h2>

<div class="main-content">
	<div class="act_list_box">
		<ul>
			<li><a href="<?php echo site_url('admin/area/add'); ?>">新規登録</a></li>
		</ul>
	</div>
	
	<div class="detail-list">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
				  <td>城市名称</td>
				  <td>城市 Slug</td>
				  <td>城市种类</td>
				  <td>表示顺序</td>
				  <td class="operation">操作</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$display_field = array('area_name', 'area_slug', 'type', 'display_order');
				$option_links = array(
					array('text' => '编辑', 'uri' => 'admin/area/edit'), 
					array('text' => '删除', 'uri' => 'admin/area/remove', 'class' => 'remove')
				);
				template_tree_list($area_list, $display_field, $option_links); ?>
			</tbody>
		</table>
	</div>
</div>