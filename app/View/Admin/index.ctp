<div id="wrapper_stats">

	<h2>Statistiques</h2>

	<p>Nombre d'utilisateurs : <?= $nbUsers ?></p>
	<p>Nombre total de vidéos : <?= $nbVideos ?></p>

</div>

<div id="block_links">

	<h2>Liens directs</h2>
	<?php echo $this->Html->link('Ajouter un pôle', array('controller' => 'poles','action' => 'add', 'admin' => false));?>
	<?php echo $this->Html->link('Ajouter un apprentissage', array('controller' => 'learnings','action' => 'add'));?>

</div>