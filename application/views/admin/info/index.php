<h2 class="title">信息列表</h2>

<div class="main-content">
	<div class="act_list_box">
		<ul>
			<li><a href="<?php echo site_url('admin/info/add'); ?>">新規登録</a></li>
		</ul>
	</div>
	
	<div class="detail-list">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
				  <td>Title</td>
				  <td>User</td>
				  <td>Area</td>
				  <td>Category</td>
				  <td>Description</td>
				  <td>Status</td>
				  <td class="operation">操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($info_list as $val): ?>
				<tr>
					<td><?php echo $val['title']; ?></td>
					<td><?php echo $val['user_name']; ?></td>
					<td><?php echo $val['area_name']; ?></td>
					<td><?php echo $val['category_name']; ?></td>
					<td><?php echo $val['description']; ?></td>
					<td class="center"><?php echo $val['status']; ?></td>
					<td class="center">
						<a href="<?php echo site_url('admin/info/edit/'.$val['id']); ?>">编辑</a> | 
						<a class="remove" href="<?php echo site_url('admin/info/remove/'.$val['id']); ?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>