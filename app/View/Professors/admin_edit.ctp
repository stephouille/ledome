<h1>Editer le speaker <?= $this->request->data['Professor']['name'] ?></h1>

<?php echo $this->Form->create('Professor', array('url' => array('controller' => 'professors', 'action' => 'edit', 'admin' => true), 'type' => 'file'));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('email');
	echo $this->Form->input('picture_file', array('type' => 'file'));
?>


<?php echo $this->Form->submit(__("Editer"), array('class' => 'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>