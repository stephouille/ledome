<h1>Ajouter un apprentissage</h1>

<?php echo $this->Form->create('Learning', array('url' => array('controller' => 'learnings', 'action' => 'add', 'admin' => true), 'type' => 'file'));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('pole_id');
	echo $this->Form->input('image_file', array('type' => 'file'));
?>


<?php echo $this->Form->submit(__("Ajouter"), array('class' => 'button')); ?>
<?php echo $this->Form->end(); ?>



<?php echo $this->Html->link('Ajouter un pôle', array('controller'=>'poles', 'action' => 'add', 'admin' => false)); ?>