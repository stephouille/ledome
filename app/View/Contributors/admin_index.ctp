<?php 
// debug($contributors); 
?>

<div id="admin_contributors">

	<h1>Tous les amis</h1>
	
	<?php
		$i = 0;
		foreach ($contributors as $contributor) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<?php echo $this->Html->image($contributor['Contributor']['image'], array('width' => 100)); ?>
					<h3><?= $contributor['Contributor']['name'] ?></h3>
					<p><?= $contributor['Contributor']['poste'] ?></p>
					<p><a href="<?= $contributor['Contributor']['website'] ?>" target="_blank"><?= $contributor['Contributor']['website'] ?></a></p>
					<?php echo $this->Html->link('Editer', array('controller' => 'contributors', 'action' => 'edit', $contributor['Contributor']['id']), array('class' => 'btn btn-success btn_deleteContributor')); ?>
					<?php echo $this->Html->link('Supprimer', array('controller' => 'contributors', 'action' => 'delete', $contributor['Contributor']['id']), array('class' => 'btn btn-danger btn_deleteContributor')); ?>
				</div>
			</div>
		<?php 
		$i++;
	} ?>

	<div id="btn_admin_contributors">
	<?php echo $this->Html->link('Ajouter un ami', array('controller' => 'contributors', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
	</div>

</div>