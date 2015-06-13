<div class="pager-wrap-bottom">
	<div class="pager-inner">
		<div class="pager-pre-btn">
			<div class="btn-wrap">
			<?php
			if($current_page != 1) {
				echo ' <a href="'.pack_fileter($category_slug, $filter_options, $previous).'">上一页</a> ';
			}
			?>
			</div>
		</div>
		<div class="pager-number-wrap">
			<ol class="pager-number">
			<?php
			//Loop num
			$page_index = 1;
			if($current_page > 5) {
				$page_index = $current_page - 4;
			}
			if($total_page > 9 && ($total_page - $current_page) < 5) {
				$page_index = $current_page - 8 + ($total_page - $current_page);
			}
			for($i = 0; $i < 9; $i++, $page_index++) {
				if($page_index > $total_page) {
					break;
				}
				if($page_index == $current_page) {
					echo '<li class="current">'.$page_index.'</li>';
				} else {
					echo  '<li class=""><a class="pager"  href="'.pack_fileter($category_slug, $filter_options, $page_index).'">'.$page_index.'</a></li>';
				}
			}
			?>
			</ol>
		</div>
		
		<div class="pager-next-btn">
			<div class="btn-wrap">
			<?php
			if($current_page < $total_page) {
				echo ' <a href="'.pack_fileter($category_slug, $filter_options, $next).'">下一页</a> ';
			}
			?>
			</div>
		</div>
	</div>
</div>