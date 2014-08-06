<div class="block_content">

	<h2><?= $learning['Learning']['name'] ?></h2>

	<ul>
	<?php foreach ($learning['Video'] as $video) { ?>
		<li>
			<p>
				<?= $video['position'] ?>. <?php echo $this->Html->link($video['title'], array('controller'=>'videos','action' => 'view', $video['id'])); ?>
			</p>
		</li>
	<?php } ?>
	</ul>

</div>