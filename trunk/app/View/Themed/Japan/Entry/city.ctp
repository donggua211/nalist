<?php
$this->Html->css('entry_city', null, array('inline' => false));
?>

<div class="category-list">
<?php foreach($categoryList as $index => $top_level): ?>
	<div class="category-entry">
		<div class="category-entry-ttl">
			<h3 class="category-entry-ttl-txt"><?php echo $this->Html->link($top_level['Category']['name'], array('controller' => 'cat', 'action' => $top_level['Category']['cat_slug']));  ?></h3>
		</div>
		<ul class="category-entry-lst cf">
			<?php foreach($top_level['children'] as $sub_level): ?>
				<li>
					<p class="category-entry-lst-ttl">
						<?php echo $this->Html->link($sub_level['Category']['name'], array('controller' => 'cat', 'action' => $sub_level['Category']['cat_slug']));  ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</ul>