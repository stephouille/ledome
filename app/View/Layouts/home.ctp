<?php

$cakeDescription = __d('cake_dev', 'Le Dome');

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('knacss');
		echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<script type="text/javascript">
	var showPOPUP;
</script>
<body>
	<div id="container">
		<div id="content">
			<div id="content_home">				
				<?php echo $this->Session->flash('auth'); ?>
				<?php echo $this->Form->create('User'); ?>
					<span>Se connecter</span>
				     <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'Email'));
				        echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Mot de passe')); ?>
				<?php echo $this->Html->link('Mot de passe perdu ?', array('controller'=>'users','action' => 'add'), array('title' => 'signup'));?>
				<?php echo $this->Form->submit('OK', array('class' => 'button')); ?>
				<?php echo $this->Form->end(); ?>
				<?php echo $this->Html->link('Signup', array('controller'=>'users','action' => 'add'), array('title' => 'signup'));?>
			</div>
			<div id="home_dome">
				<?php 
					echo $this->Html->image("dome.png", array(
					    "alt" => "Dome",
					    'url' => array('controller' => 'pages', 'action' => 'dome')
					));
				?>
			</div>
			<div class="clear"></div>
		</div>
		<div id="footer">
			<div id="copyright">© LE DOME 2014</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<?php echo $this->Html->script('app'); ?>
</body>
</html>
