<h2 class="title">用户列表</h2>

<div class="main-content">
	<div class="act_list_box">
		<ul>
			<li><a href="<?php echo site_url('admin/user/add'); ?>">新規登録</a></li>
		</ul>
	</div>
	
	<div class="detail-list">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
				  <td>用户名</td>
				  <td>Email</td>
				  <td>分组</td>
				  <td class="operation">操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($user_list as $val): ?>
				<tr>
					<td><?php echo $val['user_name']; ?></td>
					<td><?php echo $val['email']; ?></td>
					<td class="center"><?php echo $val['group_name']; ?></td>
					<td class="center">
						<a href="<?php echo site_url('admin/user/edit/'.$val['id']); ?>">编辑</a> | 
						<a class="remove" href="<?php echo site_url('admin/user/remove/'.$val['id']); ?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>