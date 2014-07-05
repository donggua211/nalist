<?php
$this->Html->css('entry_city', null, array('inline' => false));

?>

<div class="category-list">
<?php foreach($categoryList as $cat_slug => $cat_name): ?>
	<div class="category-entry">
		<div class="category-entry-ttl">
			<h3 class="category-entry-ttl-txt"><?php echo $this->Html->link($cat_name, array('controller' => 'cat',  'action' => '/', $cat_slug));  ?></h3>
		</div>
		<ul class="category-entry-lst cf">
			<?php
			$filters = $this->requestAction('/filters/findByCat/'.$cat_slug);
			pr($filters);
			foreach($filters as $val): ?>
				<li>
					<p class="category-entry-lst-ttl">
						<?php echo $this->Html->link($sub_level['Category']['name'], array('controller' => 'cat',  'action' => '/', $sub_level['Category']['cat_slug']));  ?>
					</p>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</ul>