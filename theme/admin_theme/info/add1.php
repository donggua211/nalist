<h2 class="title">新加信息(选择Category)</h2>

<div class="main-content">
	<div class="module howto">
		<div class="module-body clearfix">
			<div class="col">
				<?php foreach($category_list as $top_level): ?>
				<div class="guide-mod">
					<h3><?php echo $top_level['category_display_name']; ?></h3>
					<div class="guide-list">
						<ul class="category-list">
						<?php foreach($top_level['children'] as $sub_level): ?>
							<li><a href="<?php echo site_url('admin/info/add/'.$sub_level['id']); ?>"><?php echo $sub_level['category_display_name']; ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>