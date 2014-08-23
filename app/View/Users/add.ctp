<div class="block_content" id="page_signup">
    <h2>Créer un compte</h2>

    <!-- app/View/Users/add.ctp -->
    <div class="users form">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'add')));?>

            <div class="input text">
                <input class="txt-field" name="data[User][username]" maxlength="255" type="text" id="UserUsername" placeholder="Nom d'utilisateur">
                <span class="caption">Nom d'utilisateur</span>
            </div>
            <div class="input email required">
                <input class="txt-field" name="data[User][email]" maxlength="255" type="email" id="UserEmail" required="required" placeholder="Email">
                <span class="caption">Email</span>
            </div>
            <div class="input password required">
                <input class="txt-field" name="data[User][password]" type="password" id="UserPassword" required="required" placeholder="Mot de passe">
                <span class="caption">Mot de passe</span>
            </div>
            <div class="input password required">
                <input class="txt-field" name="data[User][re_password]" type="password" id="UserRePassword" required="required" placeholder="Confirmation du mot de passe">
                <span class="caption">Confirmation du mot de passe</span>
            </div>
        <?php echo $this->Html->image($this->Html->url(array('controller'=>'users', 'action'=>'captcha'), true),array('style'=>'','vspace'=>2)); ?>

<p>Enter security code shown above:</p>
<?php
    echo $this->Form->input('captcha',array('autocomplete'=>'off','label'=>false,'class'=>'','error'=>__('Failed validating code',true)));
?>

    <?php echo $this->Form->end(__('Ajouter'));?>
    </div>

</div>