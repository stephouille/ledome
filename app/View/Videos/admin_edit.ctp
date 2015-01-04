<h2>Edition d'une vidéo</h2>

<div class="block_content">
    <div class="videos form">
    <?php echo $this->Form->create('Video');?>
        
        <div class="left block_form">
        <?php 
            echo $this->Form->input('title', array('label' => 'Titre de la vidéo'));
            echo $this->Form->input('id_youtube', array('label' => 'ID de la vidéo Youtube'));
            echo $this->Form->input('position', array('label' => 'Position de la vidéo'));
        ?>
        </div>
        <div class="right block_form">
        <?php 
            echo $this->Form->input('description', array('label' => 'Description de la vidéo', 'type' => 'textarea'));
            echo $this->Form->input('summary', array('label' => 'Sommaire', 'type' => 'textarea') );
        ?>
        </div>
        <div class="clear"></div>

    <?php echo $this->Form->end(__('Modifier'));?>
    </div>

</div>