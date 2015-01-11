<?php get_header(array('meta_title' => $category_info['category_display_name'] . ' | ' . $city_info['area_display_name']));?>

<div class="contents-wrap">
	<div class="content">
		<div class="contents-hd-wrap">
			<div class="contents-hd-inner">
				<nav class="breadcrumbs-wrap">
					<ul class="breadcrumbs-lst">
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="/?arc=1" itemprop="url"><span itemprop="title">首页</span></a>
						</li>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="/ibaraki/" itemprop="url"><span itemprop="title"><?php echo  $city_info['area_display_name']; ?></span></a>
						</li>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<span itemprop="title">搜索结果</span>
						</li>
					</ul>
				</nav>
				<p class="contents-hd-update-txt">
					<span class="contents-hd-update-date"><?php echo date('Y年m月d日'); ?></span>更新！全国总共<span class="contents-hd-update-count">375,765</span>件
				</p>
			</div>
		</div>
	</div>
</div>


<?php get_footer();?>