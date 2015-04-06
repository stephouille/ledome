<h1>Editer un ami</h1>

<?php echo $this->Form->create('Contributor', array('url' => array('controller' => 'contributors', 'action' => 'edit', 'admin' => true), 'type' => 'file'));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('poste');
	echo $this->Form->input('website');
	echo $this->Form->input('image_file', array('type' => 'file'));
?>


<?php echo $this->Form->submit(__("Editer"), array('class' => 'btn btn-default')); ?>
<?php echo $this->Form->end(); ?>