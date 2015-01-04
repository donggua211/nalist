<?php get_header(array('meta_title' => '首页'));?>

<div class="contents-wrap">
	<div class="content">
		<div class="city-list-wrap">
		<?php $index = 0; foreach($area_list as $top_level): ?>
			<div class="city-list-box city-list-box-style<?php echo $index; ?>">
				<h2><a href="<?php echo site_url('city/'.$top_level['area_slug']); ?>"><?php echo $top_level['area_name']; ?></a></h2>
				<ul>
				<?php foreach($top_level['children'] as $sub_level): ?>
					<li><a href="<?php echo site_url('city/'.$sub_level['area_slug']); ?>"><?php echo $sub_level['area_name']; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php $index++; endforeach; ?>
		</div>
	</div>
</div>


<?php get_footer();?>