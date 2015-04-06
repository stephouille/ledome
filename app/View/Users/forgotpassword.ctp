<div class="users form">
<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'reinit_pass'))); ?>

<input name="data[User][id]" type="hidden" id="UserId" value="<?= $this->request->data['User']['id'] ?>">
<input name="data[User][crypt]" type="hidden" id="UserCrypt" value="<?= $this->request->query['crypt'] ?>">
<div class="input password required input-line">
    <input class="txt-field" name="data[User][password]" type="password" id="UserPassword" required="required" placeholder="Mot de passe">
    <span class="caption">Mot de passe</span>
</div>
<div class="input password required input-line">
    <input class="txt-field" name="data[User][re_password]" type="password" id="UserRePassword" required="required" placeholder="Confirmation du mot de passe">
    <span class="caption">Confirmez votre mot de passe</span>
</div>


<?php echo $this->Form->end(__('Réinitialisation du mot de passe')); ?>
</div>