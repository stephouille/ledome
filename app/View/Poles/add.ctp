<h1>Ajouter un pôle</h1>

<?php echo $this->Form->create('Pole', array('url' => array('controller' => 'poles', 'action' => 'add')));?>

<?php echo $this->Form->input('name'); ?>

<?php echo $this->Form->submit(__("Ajouter"), array('class' => 'button')); ?>
<?php echo $this->Form->end(); ?>

