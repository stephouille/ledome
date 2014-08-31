<?php 
// debug($learnings); 
?>

<div id="admin_learnings">

	<h1>Tous les apprentissages</h1>

	<?php foreach ($poles as $pole) { ?>

		<?php if(count($pole['Learning']) > 0) { ?>

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
								<?php echo $this->Html->link('Modifier', array('controller' => 'learnings', 'action' => 'edit', $learning['id']), array('class' => 'button')); ?>
								<?php echo $this->Html->link('Supprimer', array('controller' => 'learnings', 'action' => 'delete', $learning['id']), array('class' => 'button btn_deleteLearning')); ?>
							</div>
						</div>
						<ol>
							<?php foreach ($learning['Video'] as $video) { ?>
								<li>
									<?= $video['title'] ?>
								</li>
							<?php } ?>
						</ol>
					</li>
				<?php } ?>
			</ul>

		<?php } ?>

	<?php } ?>

	<div id="btn_admin_learnings">
	<?php echo $this->Html->link('Ajouter un apprentissage', array('controller' => 'learnings', 'action' => 'add'), array('class' => 'button')); ?>
	</div>

</div>