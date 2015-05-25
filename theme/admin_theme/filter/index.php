<h2 class="title">分组列表</h2>

<div class="main-content">
	<div class="act_list_box">
		<ul>
			<li><a href="<?php echo site_url('admin/filter/add'); ?>">新規登録</a></li>
		</ul>
	</div>
	
	<div class="detail-list">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
				  <td>过滤器名称</td>
				  <td>过滤器Key</td>
				  <td>分类名</td>
				  <td>过滤器Type</td>
				  <td>表示顺序</td>
				  <td class="operation">操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($filter_list as $val): ?>
				<tr>
					<td><?php echo $val['filter_name']; ?></td>
					<td><?php echo $val['filter_slug']; ?></td>
					<td><?php echo $val['category_name']; ?></td>
					<td><?php echo $val['type']; ?></td>
					<td><?php echo $val['display_order']; ?></td>
					<td class="center">
						<a href="<?php echo site_url('admin/filter/edit/'.$val['id']); ?>">编辑</a> | 
						<a class="remove" href="<?php echo site_url('admin/filter/remove/'.$val['id']); ?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>