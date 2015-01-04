<?php echo $this->Form->create(null, array(
    'url' => array('controller' => 'pages', 'action' => 'imprint')
)); ?>

<?php echo $this->Form->input('textarea', array('label' => 'Texte de la page', 'value' => $page_imprint['Config']['value'], 'type' => 'textarea', 'class' => 'bloc_notes') ); ?>
<?php echo $this->Form->submit('Modifier', array('class' => 'button')); ?>


<?php echo $this->Form->end(); ?>
