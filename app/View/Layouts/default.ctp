<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');

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
		<div id="user_block" class="form">
			<?php if (!$authUser) { ?>					
				<?php echo $this->Session->flash('auth'); ?>
				<?php echo $this->Form->create('User'); ?>
					<span>Mon compte</span>
				     <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'email'));
				        echo $this->Form->input('password', array('label' => '', 'placeholder' => 'mot de passe')); ?>
				<?php echo $this->Form->end(__('OK')); ?>
				<?php echo $this->Html->link('Signup', array('controller'=>'users','action' => 'add'), array('title' => 'signup'));?>
			<?php } else { ?>
				<p>Bonjour, <?= $user['firstname'] ?> !<?php echo $this->Html->link('Déconnexion', array('controller'=>'users','action' => 'logout'), array('title' => 'logout')); ?></p>
			<?php } ?>
		</div>
		<div id="header">
			<div id="close_menu"></div>
			<div id="menu">
				<ul>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='dome') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'LOGO')) . ' ' . __('<p>Le dome</p>'),
	                       array('controller'=>'pages','action' => 'dome'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-lessons" class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='lessons' && $this->params['action']=='index') )?'active' :'' ?>">
					  	<?php echo $this->Html->link($this->Html->image('icon_lessons.png', array('alt' => 'icon lessons')) . ' ' . __('<p>Les cours</p>'),
	                       array('controller'=>'lessons','action' => 'index'),
	                       array('escape' => false)); ?>
	                    <ul id="menu_lessons">
	                    	<?php foreach ($poles as $pole) {
	                    		echo '<li class="menu-level1">'.$pole['Pole']['name'];
	                    		echo '<ul class="lessons-menu">';
	                    		foreach($pole['Video'] as $video) {
	                    			echo '<li>'.$this->Html->link($video['title'], array('controller'=>'videos','action' => 'view', $video['id'])).'</li>';
	                    		}
								echo '</ul></li>';
	                    	} ?>
	                    </ul>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='help') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_help.png', array('alt' => 'icon help')) . ' ' . __('<p>Nous aider</p>'),
	                       array('controller'=>'pages','action' => 'help'),
	                       array('escape' => false)); ?>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='friends') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_friends.png', array('alt' => 'icon friends')) . ' ' . __('<p>Les amis</p>'),
	                       array('controller'=>'pages','action' => 'friends'),
	                       array('escape' => false)); ?>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='about') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_about.png', array('alt' => 'icon about')) . ' ' . __('<p>A propos</p>'),
	                       array('controller'=>'pages','action' => 'about'),
	                       array('escape' => false)); ?>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='contact') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_contact.png', array('alt' => 'icon contact')) . ' ' . __('<p>Contact</p>'),
	                       array('controller'=>'pages','action' => 'contact'),
	                       array('escape' => false)); ?>
					</li>
				</ul>
			</div>

		</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>

		</div>
		<div class="clear"></div>

		<div id="footer">
			<div id="copyright">© LE DOME 2014</div>
			<div id="links_footer">
				<a href="#">Mentions légales</a>
				<a href="#">Contact</a>				
			</div>
			<div id="sharing_footer">

			</div>
		</div>

	</div>
	<?php echo $this->element('sql_dump'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<script src="//www.youtube.com/player_api"></script>
	<?php echo $this->Html->script('jquery-min'); ?>
	<?php echo $this->Html->script('app'); ?>
	<?php echo $this->Html->script('tiny_mce'); ?>

</body>
</html>
