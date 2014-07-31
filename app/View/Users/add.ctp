<div class="block_content">

    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('User');?>
        <fieldset>
            <legend><?php echo __('Ajouter User'); ?></legend>
            <?php 
            echo $this->Form->input('firsname');
            echo $this->Form->input('lastname');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('re_password', array('type' => 'password'));
        ?>
        </fieldset>
    <?php echo $this->Form->end(__('Ajouter'));?>
    </div>

</div>