<div class="block_content">

	<h2><?= $pole['Pole']['name'] ?></h2>

	<ul>
	<?php 
		$i = 1;
		foreach ($pole['Learning'] as $learning) { ?>
		<li>
			<p>
				<?= $i ?>. <?php echo $this->Html->link($learning['name'], array('controller'=>'learnings','action' => 'view', $learning['id'])); ?>
			</p>
		</li>
	<?php 
		$i++;
	} ?>
	</ul>

</div>