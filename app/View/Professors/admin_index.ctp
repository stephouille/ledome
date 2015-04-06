<?php 
// debug($professors); 
?>

<div id="admin_professors">

	<h1>Tous les speakers</h1>
	
	<?php
		$i = 0;
		foreach ($professors as $professor) {
			?>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<?php echo $this->Html->image($professor['Professor']['picture'], array('width' => 100)); ?>
					<h3><?= $professor['Professor']['name'] ?></h3>
					<p><?= $professor['Professor']['email'] ?></p>
					<?php echo $this->Html->link('Editer', array('controller' => 'professors', 'action' => 'edit', $professor['Professor']['id']), array('class' => 'btn btn-success btn_deleteContributor')); ?>
					<?php echo $this->Html->link('Supprimer', array('controller' => 'professors', 'action' => 'delete', $professor['Professor']['id']), array('class' => 'btn btn-danger btn_deleteContributor')); ?>
				</div>
			</div>
		<?php 
		$i++;
	} ?>

	<div id="btn_admin_professors">
	<?php echo $this->Html->link('Ajouter un speaker', array('controller' => 'professors', 'action' => 'add'), array('class' => 'btn btn-primary')); ?>
	</div>

</div>