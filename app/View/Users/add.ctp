<div class="block_content">

    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('User');?>
        <fieldset>
            <legend><?php echo __('Ajouter User'); ?></legend>
            <?php 
            echo $this->Form->input('username', array('label' => "Nom d'utilisateur"));
            echo $this->Form->input('email');
            echo $this->Form->input('password', array('label' => 'Mot de passe'));
            echo $this->Form->input('re_password', array('type' => 'password', 'label' => 'Confirmez le mot de passe'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Ajouter'));?>
    </div>

</div>