<?php
$this->Html->css('entry_city', null, array('inline' => false));
?>

<div class="mp-top-contents-wrap">
<?php foreach($categoryList as $index => $top_level): ?>
	<div class="mp-unique-sch">
		<div class="mp-unique-sch-ttl">
			<h3 class="mp-unique-sch-ttl-txt"><?php echo $this->Html->link($top_level['Category']['name'], array('controller' => 'cat', 'slug' => $top_level['Category']['cat_slug']));  ?></h3>
		</div>
		<ul class="mp-unique-sch-lst cf">
			<?php foreach($top_level['children'] as $sub_level): ?>
				<li>
					<p class="mp-unique-sch-lst-ttl">
						<?php echo $this->Html->link($sub_level['Category']['name'], array('controller' => 'cat', 'slug' => $sub_level['Category']['cat_slug']));  ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</ul>