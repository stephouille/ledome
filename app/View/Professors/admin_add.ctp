<h1>Ajouter un speaker</h1>

<?php echo $this->Form->create('Professor', array('url' => array('controller' => 'professors', 'action' => 'add', 'admin' => true), 'type' => 'file'));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('email');
	echo $this->Form->input('picture_file', array('type' => 'file'));
?>


<?php echo $this->Form->submit(__("Ajouter"), array('class' => 'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>