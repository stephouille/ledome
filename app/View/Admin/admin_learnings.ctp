<?php 
// debug($learnings); 
?>

<div id="admin_learnings">

	<h1>Tous les apprentissages</h1>

	<?php foreach ($poles as $pole) { ?>

	<h3>
		<?= $pole['Pole']['name'] ?>
	</h3>

	<ul>
		<?php foreach ($pole['Learning'] as $learning) { ?>
			<li>
				<div class="heading_learning">
					<?php echo $this->Html->image($learning['image'], array('width' => '30px')); ?>
					<?= $learning['name'] ?>
					<div class="btn_heading">
						<?php echo $this->Html->link('Ajouter une vidéo', array('controller' => 'videos', 'action' => 'add', $learning['id']), array('class' => 'button')); ?>
						<?php echo $this->Html->link('Modifier', array('controller' => 'learnings', 'action' => 'edit', $learning['id']), array('class' => 'button')); ?>
						<?php echo $this->Html->link('Supprimer', array('controller' => 'learnings', 'action' => 'delete', $learning['id']), array('class' => 'button btn_deleteLearning')); ?>
					</div>
				</div>
				<ol>
					<?php foreach ($learning['Video'] as $video) { ?>
						<li>
							<?= $video['title'] ?>
							<div class="fonctions_editions">
								<?php echo $this->Html->link('Modifier', array('controller' => 'videos', 'action' => 'edit', $video['id']), array('class' => 'link')); ?>
								<?php echo $this->Html->link('Supprimer', array('controller' => 'videos', 'action' => 'delete', $video['id']), array('class' => 'link')); ?>
							</div> 
						</li>
					<?php } ?>
				</ol>
			</li>
		<?php } ?>
	</ul>

	<?php } ?>

	<div id="btn_admin_learnings">
	<?php echo $this->Html->link('Ajouter un apprentissage', array('controller' => 'learnings', 'action' => 'add'), array('class' => 'button')); ?>
	</div>

</div>