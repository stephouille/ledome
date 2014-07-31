<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Admin');?>
    <fieldset>
        <legend><?php echo __('Ajouter Admin'); ?></legend>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('re_password', array('type' => 'password'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>