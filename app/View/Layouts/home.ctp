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
<body>
	<div id="container">
		<div id="content">
			<div id="content_home">				
				<?php echo $this->Session->flash('auth'); ?>
				<?php echo $this->Form->create('User'); ?>
					<span>Mon compte</span>
				     <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'email'));
				        echo $this->Form->input('password', array('label' => '', 'placeholder' => 'mot de passe')); ?>
				<?php echo $this->Form->end(__('OK')); ?>
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
