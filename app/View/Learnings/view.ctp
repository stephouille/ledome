<div class="block_content">
	<div id="wrapper_learningPage">
		<h2><?= $learning['Learning']['name'] ?></h2>

		<?php 
			if ($authUser) {
				if($isAddedToDome) {
					echo $this->Html->link('Supprimer de mon dôme', array('controller'=>'learnings','action' => 'remove_from_dome', $learning['Learning']['id']), array('class' => 'button', 'id' => 'btn_removeDome'));
				} else {
					echo $this->Html->link('Ajouter à mon dôme', array('controller'=>'learnings','action' => 'add_to_dome', $learning['Learning']['id']), array('class' => 'button', 'id' => 'btn_addDome')); 	
				}
			}
		?>

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
</div>