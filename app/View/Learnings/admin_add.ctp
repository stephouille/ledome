<h1>Ajouter un apprentissage</h1>

<?php echo $this->Form->create('Learning', array('url' => array('controller' => 'learnings', 'action' => 'add', 'admin' => true)));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('pole_id');
?>


<?php echo $this->Form->submit(__("Ajouter"), array('class' => 'button')); ?>
<?php echo $this->Form->end(); ?>



<?php echo $this->Html->link('Ajouter un pôle', array('controller'=>'poles', 'action' => 'add', 'admin' => false)); ?>