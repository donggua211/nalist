<?php
$this->Html->css('entry_index', null, array('inline' => false));
?>

<div class="city-list-wrap">
<?php foreach($areasList as $index => $top_level): ?>
	<div class="city-list-box city-list-box-style<?php echo $index; ?>">
		<h2><?php echo $this->Html->link($top_level['Area']['areaname'], array('controller' => '', 'city' => $top_level['Area']['slug']));  ?></h2>
		<ul>
		<?php foreach($top_level['children'] as $sub_level): ?>
			<li><?php echo $this->Html->link($sub_level['Area']['areaname'], array('controller' => '', 'city' => $sub_level['Area']['slug']));  ?></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php endforeach; ?>
</ul>