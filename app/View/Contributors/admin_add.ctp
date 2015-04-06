<h1>Ajouter un ami</h1>

<?php echo $this->Form->create('Contributor', array('url' => array('controller' => 'contributors', 'action' => 'add', 'admin' => true), 'type' => 'file'));?>

<?php 
	echo $this->Form->input('name'); 
	echo $this->Form->input('poste');
	echo $this->Form->input('website');
	echo $this->Form->input('image_file', array('type' => 'file'));
?>


<?php echo $this->Form->submit(__("Ajouter"), array('class' => 'button')); ?>
<?php echo $this->Form->end(); ?>