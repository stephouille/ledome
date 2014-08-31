<div class="block_content">
	<div id="wrapper_polePage">

		<h2><?= $pole['Pole']['name'] ?></h2>

		<ul>
		<?php 
			$i = 1;
			foreach ($pole['Learning'] as $learning) { ?>
			<li>
				<p>
					<?php echo $this->Html->image($learning['image'], array('width' => '40px')); ?><?php echo $this->Html->link($learning['name'], array('controller'=>'learnings','action' => 'view', $learning['id'])); ?>
				</p>
			</li>
		<?php 
			$i++;
		} ?>
		</ul>

	</div>
</div>