<?php

$cakeDescription = __d('cake_dev', 'Le Dome');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>Le Dome - Rendre le savoir accessible à tous</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('knacss');
		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<style type="text/css">
	#container {
		background-image: url(img/background_home.jpg);
	}
</style>
<body>
	<div id="container">
		<div id="content_home">
			<div id="user_block" class="form">

				<div id="buttons_users">
					<a class="button button_login" href="javascript:void(0)">Se connecter</a>	
				</div>

				<div id="form_login" style="display:none">				
					<!-- <?php echo $this->Session->flash('auth'); ?> -->
					<?php echo $this->Form->create('User'); ?>
					     <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'email'));
					        echo $this->Form->input('password', array('label' => '', 'placeholder' => 'mot de passe')); ?>
					<?php echo $this->Form->end(__('OK'), array('class' => 'button')); ?>
				</div>

			</div>
			<h1>LE DOME</h1>
			<div class="users form">
				<?php echo $this->Html->image('logo.png', array('alt' => 'LOGO', 'id' => 'logo')); ?>
		    	<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'add')));?>
		            <div class="input text input-line">
		                <input class="txt-field" name="data[User][username]" maxlength="255" type="text" id="UserUsername" placeholder="Nom d'utilisateur">
		                <span class="caption">Nom d'utilisateur</span>
		            </div>
		            <div class="input email required input-line">
		                <input class="txt-field" name="data[User][email]" maxlength="255" type="email" id="UserEmail" required="required" placeholder="Email">
		                <span class="caption">Email</span>
		            </div>
		            <div class="input password required input-line">
		                <input class="txt-field" name="data[User][password]" type="password" id="UserPassword" required="required" placeholder="Mot de passe">
		                <span class="caption">Mot de passe</span>
		            </div>
		            <div class="input password required input-line" >
		                <input class="txt-field" name="data[User][re_password]" type="password" id="UserRePassword" required="required" placeholder="Confirmation du mot de passe">
		                <span class="caption">Confirmez votre mot de passe</span>
		            </div>
		            <?php 
		            	// $this->Captcha->render($captchaSettings); 
		            ?>

		        <!-- <div class="input text required">
		            <input class="txt-field" name="data[captcha]" autocomplete="off" type="text" id="UserCaptcha" required="required" placeholder="Contrôle de sécurité">
		            <span class="caption">Entrez le code que vous voyez ci-dessus</span>
		        </div> -->
		    	<?php echo $this->Form->submit(__("S'inscrire"),     array('class' => 'button')); ?>
		    	<?php echo $this->Form->end(); ?>
		    </div>
			<div id="home_dome">
				<?php echo $this->Html->link('<div id="wrapper_home_dome"><p>Dans LE DOME, apprendre, tu pourras.<br/>Gratuit, ce sera.</p></div>'.$this->Html->image("dome.png"), array('controller'=>'pages','action' => 'dome'), array('escape' => false)); ?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$('.button_login').click(function() {
			$('#form_login').show();
			$('#buttons_users').hide();
		});
		$(function (){
	        var inpParent = $('.input-line');

	        if (!inpParent.length) return;

	        inpParent.each(function (){
	            var thisLine =  $(this),
	                inpTxt =  thisLine.find('.txt-field'),
	                inpCapt =  thisLine.find('.caption');

	            function fIn() {
	                inpTxt.parent().addClass('active');
	            }
	            function fOut() {
	                if(inpTxt.val() != 0){

	                }else{
	                    inpTxt.parent().removeClass('active');
	                }
	            }

	            inpTxt.focusin(fIn);
	            inpTxt.focusout(fOut);
	        })
	    });
	</script>
</body>
</html>
