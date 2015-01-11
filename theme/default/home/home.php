<?php get_header(array('meta_title' => $city_info['area_display_name']));?>

<div class="contents-wrap">
	<div class="content">
		<div class="category-list">
		<?php $index = 0; foreach($category_list as $top_level): ?>
			<div class="category-entry clearfix">
				<div class="category-entry-ttl">
					<a href="<?php echo site_url($top_level['category_slug']); ?>"><?php echo $top_level['category_display_name']; ?></a>
					<div class="category-entry-ttl-lnk"><a href="<?php echo site_url($top_level['category_slug']); ?>">全部一览</a></div>
				</div>
				<ul class="category-entry-lst">
				<?php foreach($top_level['children'] as $sub_level): ?>
					<li class="category-entry-lst-ttl"><a href="<?php echo site_url($sub_level['category_slug']); ?>"><?php echo $sub_level['category_display_name']; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php $index++; endforeach; ?>
		</div>
	</div>
</div>


<?php get_footer();?>