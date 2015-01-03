<h2 class="title">分组列表</h2>

<div class="main-content">
	<div class="act_list_box">
		<ul>
			<li><a href="<?php echo site_url('admin/group/add'); ?>">新規登録</a></li>
		</ul>
	</div>
	
	<div class="detail-list">
		<table border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
				  <td>分组名</td>
				  <td>Permission</td>
				  <td class="operation">操作</td>
				</tr>
			</thead>
			<tbody>
			<?php foreach($group_list as $val): ?>
				<tr>
					<td><?php echo $val['group_name']; ?></td>
					<td><?php echo $val['permission']; ?></td>
					<td class="center">
						<a href="<?php echo site_url('admin/group/edit/'.$val['id']); ?>">编辑</a> | 
						<a class="remove" href="<?php echo site_url('admin/group/remove/'.$val['id']); ?>">删除</a>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>