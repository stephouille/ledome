<h2>Ajouter une vidéo</h2>

<div class="block_content">
    <div class="videos form">
    <?php echo $this->Form->create('User');?>
        <fieldset>
            <?php 
            echo $this->Form->input('title');
            echo $this->Form->input('url');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('re_password', array('type' => 'password'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Ajouter'));?>
    </div>

</div>