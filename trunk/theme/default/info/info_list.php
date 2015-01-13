<?php get_header(array('meta_title' => $category_info['category_display_name'] . ' | ' . $city_info['area_display_name']));?>

<div class="contents-wrap">
	<div class="content">
		<div class="contents-main-wrap">
			<div class="contents-hd-inner cf">
				<nav class="breadcrumbs-wrap">
					<ul class="breadcrumbs-lst">
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo site_url('home'); ?>" itemprop="url"><span itemprop="title">首页</span></a>
						</li>
						<?php foreach($city_info['parent'] as $val) : ?>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo  site_url($val['area_slug'], false); ?>" itemprop="url"><span itemprop="title"><?php echo  $val['area_display_name']; ?></span></a>
						</li>
						<?php endforeach; ?>
						
						<?php foreach($category_info['parent'] as $val) : ?>
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<a href="<?php echo  site_url($val['category_slug']); ?>" itemprop="url"><span itemprop="title"><?php echo  $val['category_display_name']; ?></span></a>
						</li>
						<?php endforeach; ?>
						
						<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
							<span itemprop="title">搜索结果</span>
						</li>
					</ul>
				</nav>
				<p class="contents-hd-update-txt">
					<span class="contents-hd-update-date"><?php echo date('Y年m月d日'); ?></span>更新！全国总共<span class="contents-hd-update-count">375,765</span>件
				</p>
			</div>
		
		
			<div class="top-txt-wrap">
				<div class="top-txt-inner">
					<div class="top-txt-container">
						<ul class="top-txt-lst">
							<li class="mp-notice-txt-red">・人類初!? 無重力で調査バイト！宇宙とファッションの『<a href="/twc/info/super/index.html?svos=SCP01030101inforarejob201501">激レアバイト</a>』を1/26まで募集中！</li>
							<li>・【メルマガ登録キャンペーン実施中】抽選で500円のQUOカードが当たる!!&nbsp;詳しくは<a href="/twc/info/mailcamp/index.html?svos=SCP01030101mailcaminfo2014" target="_blank">コチラ</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="contents-box-tbl-wrap" id="jsi-sch-panel-wrapper" data-init-srch-btn="true">
                <dl class="panel-tbl-wrap">
                    <dt>雇用形態</dt>
                    <dd id="jsi-employment-select">
                        <form name="joSrchRsltListActionForm" id="emcForm" method="get" action="/joSrchRsltList/" autocomplete="off"><ul class="small-area-tbl-btn">
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="01" id="01">
                                        <a href="javascript:void(0);" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_01,">アルバイト</a></li>
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="06" id="06">
                                        <a href="javascript:void(0);" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_06,">パート</a></li>
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="04" id="04">
                                        <a href="javascript:void(0);" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_04,">正社員</a></li>
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="03" id="03">
                                        <a href="javascript:void(0);" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_03,">契約社員</a></li>
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="02" id="02">
                                        <a href="/tokyo/jc_010/emc_02/">派遣社員</a></li>
                                <li>
                                        <input type="checkbox" class="cndLmtList-employ-select" name="emc" value="05" id="05">
                                        <a href="javascript:void(0);" class="jsc-jump-link" data-jump-param="tokyo,jc_010,emc_05,">その他</a></li>
                                </ul>
                            <div class="btn-wrap panel-btn-right">
                                <input type="submit" value="絞り込む" class="grd-blue btn-blue-h30 jsc-employment-btn">
                            </div>
                            <input type="hidden" name="ac" value="041"><input type="hidden" name="jc" value="010"></form>
					</dd>
                </dl>
                <dl class="panel-tbl-wrap panel-free-word-sch">
                    <dt>フリーワード</dt>
                    <dd id="jsi-freeword">
						<form name="joSrchRsltListActionForm" id="fwForm" method="get" action="/joSrchRsltList/" autocomplete="off"><input type="text" name="fw" value="" id="textfield000" class="free-word-txtfield placeholder jsc-max-length-limit jsc-freeword-field jsc-need-alert jsc-placeholder" data-placeholder="例) 日払い、短期、新宿区" data-alert-message="条件を1つ以上選択してください。" data-maxlength="25" maxlength="25">
						<div class="btn-wrap panel-btn-right">
						<input type="submit" value="絞り込む" class="grd-blue btn-blue-h30 jsc-freeword-btn">
						</div>
						</form>
					</dd>
                </dl>
            </div>
			
			<div class="job-cassette-lst-wrap">
				<div class="display-num-wrap">
					<p class="hit-num-txt"><span class="hit-num">8,095</span><span>件</span>がヒット</p>
					<p class="display-num-txt">1~30件を表示</p>
					<dl class="sort-nav-wrap">
						<dt>並び替え</dt>
						<dd>
							<ul class="sort-nav-txt">
								<li class="current"><span>おすすめ順</span></li>
								<li><a href="/tokyo/jc_010/?ds=03">新着順</a></li>
								<li><a href="/tokyo/jc_010/?ds=04">時給順</a></li>
								<li><a href="/tokyo/jc_010/?ds=05">日給順</a></li>
								<li><a href="/tokyo/jc_010/?ds=06">月給順</a></li>
								</ul>
						</dd>
					</dl>
				</div>
				<div class="btn-regist-mail-wrap">
					<div class="btn-wrap btn-regist-mail">
						<a href="javascript:void(0);" class="grd-gray btn-gray-h41 btn-regist-mail ico-arrow-b jsc-jump-link" data-jump-param="joMailReg,">この条件でメール登録する(<span>無料</span>)</a></div>
				</div>
			</div>
			
			
			
			<div class="job-lst-cassette-wrap">
				<div class="job-lst-box-wrap">
					<div>
						<a href="/detail/clc_0232650001/joid_18417252/" class="job-lst-ttl-wrap">
							<h3 class="job-lst-ttl-txt">
							<span class="job-lst-ico">NEW</span>
							株式会社レナウン　人事部人事課ＴＷ首都圏採用係
							</h3>
						</a>
						<a href="/detail/clc_0232650001/joid_18417252/" class="job-lst-box-inner">
							<div class="job-lst-box-caption">
								<div class="job-lst-txt-wrap">
									<p><span class="job-lst-txt-lnk">
									[契]メンズアパレル接客販売スタッフ</span></p>
									<div class="job-lst-txt-inner">
										<p class="job-lst-txt-detail">※勤務地により異なる</p>
									</div>
								</div>
								<div class="job-lst-btn-wrap">
									<div class="btn-wrap"><span class="grd-gray btn-gray-h30 i-btn-lnk ico-arrow-a">詳細へ</span></div>
								</div>
							</div>
							<div class="job-lst-box-tbl">
								<dl class="job-ditail-tbl-inner">
									<dt class="job-ditail-tbl-item ico-salary">給与</dt>
									<dd>
										<p><span class="txt-salary">日給</span><span class="txt-salary b">8500</span><span class="txt-salary">円～</span><span class="txt-salary b">1万2000</span><span class="txt-salary">円</span></p>
									</dd>
								</dl>
								<dl class="job-ditail-tbl-inner">
									<dt class="job-ditail-tbl-item ico-workhour">勤務時間</dt>
									<dd>
										<p><span>実働7.5h(休憩1.5h)シフト制</span></p>
									</dd>
								</dl>
							</div>
						</a>
					</div>
					<div class="job-lst-box-merit-wrap">
						<ul class="job-lst-box-merit">
							<li>服装自由</li>
							<li>髪型自由</li>
							<li>経験者歓迎</li>
							<li>学歴不問</li>
							<li>長期歓迎</li>
							<li>交通費支給</li>
							<li>車・バイク</li>
						</ul>
					</div>
					<div class="lst-wrap-entry">
						<div class="lst-wrap-period">
							<p class="txt-em">
							
							掲載期間：2015年1月12日07:00～2015年1月20日07:00</p>
							</div>

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
			</div>
			
			
			
			
			<div class="pager-wrap-bottom">
				<div class="pager-inner">
					<div class="pager-pre-btn">
						<div class="btn-wrap">
						</div>
					</div>
					<div class="pager-number-wrap">
						<ol class="pager-number">
							<li class="current">1</li><li class=""><a href="/tokyo/jc_010/?page=2">2</a></li><li class=""><a href="/tokyo/jc_010/?page=3">3</a></li><li class=""><a href="/tokyo/jc_010/?page=4">4</a></li><li class=""><a href="/tokyo/jc_010/?page=5">5</a></li><li class="pager-dot">...</li>
							<li class=""><a href="/tokyo/jc_010/?page=270">270</a></li></ol>
					</div>
					<div class="pager-next-btn">
						<div class="btn-wrap">
						<a class="linknone grd-gray btn-gray-h30 i-btn-next ico-arrow-a" href="/tokyo/jc_010/?page=2">
							下一页
						</a></div>
					</div>
				</div>
			</div>
			
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