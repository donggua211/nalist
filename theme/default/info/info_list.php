<?php get_header(array('meta_title' => $category_info['category_display_name'] . ' | ' . $city_info['area_display_name']));?>

<div class="contents-wrap">
	<div class="content">
		<div class="contents-main-wrap">
			<div class="contents-hd-inner cf">
				<nav class="breadcrumbs-wrap">
					<ul class="breadcrumbs-lst">
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo site_url('home'); ?>" itemprop="url"><span itemprop="title"><?php echo lang('home'); ?></span></a>
						</li>
						<?php foreach($city_info['parent'] as $val) : ?>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo  site_url($val['area_slug'], false); ?>" itemprop="url"><span itemprop="title"><?php echo  $val['area_display_name']; ?></span></a>
						</li>
						<?php endforeach; ?>
						
						<?php foreach($category_info['parent'] as $val) : ?>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo  ($val['parent_id'] == 0) ? site_url($city_slug, false) : site_url($val['category_slug']); ?>" itemprop="url"><span itemprop="title"><?php echo  $val['category_display_name']; ?></span></a>
						</li>
						<?php endforeach; ?>
						
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<span itemprop="title"><?php echo lang('info.search_result'); ?></span>
						</li>
					</ul>
				</nav>
				<p class="contents-hd-update-txt">
					<span class="contents-hd-update-date"><?php echo date('Y年m月d日'); ?></span>更新！全国总共<span class="contents-hd-update-count">375,765</span>件
				</p>
			</div>
			
			<div class="contents-box-tbl-wrap" id="jsi-sch-panel-wrapper" data-init-srch-btn="true">
				<dl class="panel-tbl-wrap">
					<dt><?php echo $category_info['direct_parent']['category_display_name']; ?></dt>
					<dd id="jsi-employment-select">
						<ul class="small-area-tbl-btn">
							<?php foreach($category_info['neighbor'] as $val) : ?>
							<li>
								<?php if($val['id'] == $category_info['id']) : ?>
									<?php echo  $val['category_display_name']; ?>
								<?php else: ?>
									<a href="<?php echo pack_fileter($val['category_slug'], $filter_options); ?>" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_01,"><?php echo  $val['category_display_name']; ?></a>
								<?php endif; ?>
							</li>
							<?php endforeach; ?>
						</ul>
					</dd>
				</dl>
				
				<?php foreach($filter_info as $val) : ?>
				<?php
				if($val['type'] == 'text' || $val['type'] == 'number') {
					continue;
				}
				?>
				<dl class="panel-tbl-wrap">
					<dt><?php echo $val['filter_name']; ?></dt>
					<dd id="jsi-employment-select">
						<?php
						switch($val['type']) {
							case 'select':
							case 'radio':
							case 'checkbox':
								echo '<ul class="small-area-tbl-btn">';
								echo '<li>';
								if(isset($filter_options[$val['id']])) {
									$this_filter_options = $filter_options;
									unset($this_filter_options[$val['id']]);
									echo '<a href="'.pack_fileter($category_slug, $this_filter_options).'" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_01,">'.lang('info.filter_all').'</a>';
								} else {
									echo lang('info.filter_all');
								}
								echo '</li>';
								
								foreach($val['options'] as $option) {
									echo '<li>';
									
									if(isset($filter_options[$val['id']]) && $filter_options[$val['id']] == $option['option_value'] ? 'SELECTED' : '') {
										echo $option['option_name'];
									} else {
										$this_filter_options = $filter_options;
										$this_filter_options[$val['id']] = $option['option_value'];
										echo '<a href="'.pack_fileter($category_slug, $this_filter_options).'" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_01,">'.$option['option_name'].'</a>';
									}
									
									echo '</li>';
								}
								echo '</ul>';
								break;
							case 'text':
							case 'number':
							default:
								break;
						}
						?>
					</dd>
				</dl>
				<?php endforeach; ?>
				
				<dl class="panel-tbl-wrap panel-free-word-sch">
					<dd id="jsi-freeword">
						<form name="joSrchRsltListActionForm" id="fwForm" method="get" action="<?php echo pack_fileter($category_slug, $filter_options); ?>" >
							<input type="text" name="keyword" value="<?php echo $keyword; ?>" id="textfield000" class="free-word-txtfield placeholder jsc-max-length-limit jsc-freeword-field jsc-need-alert jsc-placeholder" maxlength="25">
						<div class="btn-wrap panel-btn-right">
							<input type="submit" value="<?php echo lang('info.keyword'); ?>" class="grd-blue btn-blue-h30 jsc-freeword-btn">
						</div>
						</form>
					</dd>
				</dl>
			</div>
			
			<div class="job-lst-cassette-wrap">
				<?php foreach($info_list as $val): ?>
				<div class="job-lst-box-wrap">
					<div>
						<a href="/detail/clc_0232650001/joid_18417252/" class="job-lst-ttl-wrap">
							<h3 class="job-lst-ttl-txt">
							<span class="job-lst-ico">NEW</span>
							<?php echo $val['title']; ?>
							</h3>
						</a>
						<a href="/detail/clc_0232650001/joid_18417252/" class="job-lst-box-inner">
							<div class="job-lst-box-caption">
								<div class="job-lst-txt-wrap">
									<div class="job-lst-txt-inner">
										<p class="job-lst-txt-detail"><?php echo $val['description']; ?></p>
									</div>
								</div>
								<div class="job-lst-btn-wrap">
									<div class="btn-wrap"><span class="grd-gray btn-gray-h30 i-btn-lnk ico-arrow-a">詳細へ</span></div>
								</div>
							</div>
							<div class="job-lst-box-tbl">
								<dl class="job-ditail-tbl-inner">
									<dt class="job-ditail-tbl-item ico-workhour">更新时间</dt>
									<dd>
										<p><span><?php echo date('Y年m月d日', strtotime($val['update_time'])); ?></span></p>
									</dd>
								</dl>
							</div>
						</a>
					</div>
					<?php 
					if(!empty($val['filters'])): 
					$filters = explode(';', $val['filters']);
					?>
					<div class="job-lst-box-merit-wrap">
						<ul class="job-lst-box-merit">
							<?php foreach($filters as $filter): ?>
							<li><?php echo $filter; ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<?php endif; ?>
					<div class="lst-wrap-entry">
						<div class="btn-wrap-entry">
							<ul class="btn-inner-entry">
								<li>
									<div class="keep-btn-wrap-s">
										<p class="notice-txt-keep ico-arrow jsc-keep-notifier jsc-dn">キープしました</p>
										<a href="#" class="grd-gray btn-keep-w104 ico-arrow-b jsc-btn-keep" onclick="keepListReg('18417252','01');_sc_trackCustomLink('keep','01','18417252','02');">キープする</a><a href="javascript:void(0);" class="btn-kept-w104 jsc-btn-kept jsc-dn jsc-jump-link" data-jump-param="keepList,">キープ済み</a></div>
								</li>
								<li>
									<div class="btn-wrap-web">
									<a href="https://townwork.net/appInpt/?joid=18417252" class="grd-blue btn-blue-h43-s" onclick="_sc_trackCustomLink('apply','01','18417252','02');delay(500)" rel="nofollow">WEBで応募する</a></div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			
			<?php get_template('parts/page_nav', $page_nav); ?>
			
			<div class="center-btn-wrap">
				<div class="btn-wrap btn-regist-mail">
					<a href="javascript:void(0);" class="grd-gray btn-gray-h41 btn-regist-mail ico-arrow-b jsc-jump-link" data-jump-param="joMailReg,">この条件でメール登録する(<span>無料</span>)</a></div>
			</div>
			
			<div class="sch-contents-box-wrap">
				<p class="l-yellow-ttl">注目キーワード</p>
				<div class="contents-box-inner">
					<ul class="side-lnk-lst">
					<li><a href="/jobCategory/jc_010/">サービス</a></li>
					</ul>
				</div>
			</div>
			
			<section>
				<div class="mp-sch-contents-box-wrap">
					<p class="l-yellow-ttl">人気のキーワード</p>
					<div class="contents-box-inner">
						<ul class="side-lnk-lst">
							<li><a href="/haken/">派遣</a></li>
							<li><a href="/merit/prc_0005/">主婦・主夫歓迎</a></li>
							<li><a href="/jobCategory/jc_001/">飲食/フード</a></li>
							<li><a href="/merit/prc_0010/">副業・WワークOK</a></li>
							<li><a href="/theme/kwd_0000000002/">郵便局</a></li>
							<li><a href="/jobCategory/jc_001/jmc_00116/">パン屋・ケーキ屋</a></li>
							<li><a href="/jobCategory/jc_002/jmc_00216/">書店（本屋）</a></li>
							<li><a href="/theme/kwd_0000000010/">図書館</a></li>
							<li><a href="/jobCategory/jc_014/jmc_01401/">塾講師</a></li>
						</ul>
					</div>
				</div>
			</section>
			
			<div class="site-discription">
				<p>求人情報が満載！東京都でサービスの仕事/求人を探せる【タウンワーク】をご覧のみなさま<br>東京都でサービスのアルバイト[バイト]やパートの求人をお探しなら、リクルートが運営する『タウンワーク』をご利用ください。応募もカンタン、豊富な募集・採用情報を掲載するタウンワークが、みなさまのお仕事探しをサポートします！</p>
			</div>
			
			<nav class="ft-hd-nav">
				<div class="btn-back">
					<a href="javascript:void(0);" class="grd-gray btn-gray-h30 i-btn-prev ico-arrow-b" onclick="javascript:history.back()">戻る</a></div>
				<div class="lnk-pagetop">
					<a href="javascript:void(0);" id="jsi-link-scroll-top" class="lnk-gray">ページの先頭へ</a></div>
			</nav>
		</div>
		
		<?php get_sidebar();?>
	</div>
</div>


<?php get_footer();?>