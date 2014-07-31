
<h2>Accès Admin</h2>
 
<?php
echo $this->Session->flash('auth');
 
echo $this->Form->create('Admin');
echo $this->Form->input('login', array('label' => "Identifiant :"));
echo $this->Form->input('password', array('label' => "Mot de passe :"));
echo $this->Form->end("Connexion");
?>