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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		var showPOPUP = "<?php Print($this->Session->read('popup')); ?>";
	</script>
</head>
<body>
	<div id="preloadedImages"></div>
	<div id="container">
		<div id="user_block" class="form">

			<?php if (!$authUser) { ?>

				<div id="buttons_users">
					<?php echo $this->Html->link('Créer un compte', array('controller' => 'users','action' => 'add'), array('title' => 'signup', 'class' => 'button greenbutton'));?>
					<a class="button button_login" href="javascript:void(0)">Se connecter</a>	
				</div>

				<div id="form_login" style="display:none">				
					<?php echo $this->Session->flash('auth'); ?>
					<?php echo $this->Form->create('User'); ?>
					     <?php echo $this->Form->input('email', array('label' => '', 'placeholder' => 'email'));
					        echo $this->Form->input('password', array('label' => '', 'placeholder' => 'mot de passe')); ?>
					<?php echo $this->Form->end(__('OK'), array('class' => 'button')); ?>
				</div>

			<?php } else { ?>

				<p>Bonjour, <?= $user['username'] ?> !<?php echo $this->Html->link('Déconnexion', array('controller'=>'users','action' => 'logout'), array('title' => 'logout')); ?></p>

			<?php } ?>
			

		</div>
		<div id="header">
			<div id="menu">
				<ul>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='dome') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'LOGO')) . ' ' . __('<p>Le dome</p>'),
	                       array('controller'=>'pages','action' => 'dome'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-lessons" class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='lessons' && $this->params['action']=='index') )?'active' :'' ?>">
					  	<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>Les cours</p>'),
	                       array('controller'=>'lessons','action' => 'index'),
	                       array('escape' => false)); ?>
	                    <ul id="menu_lessons">
	                    	<?php foreach ($poles as $pole) {
	                    		echo '<li class="menu-level1">'.$this->Html->link($pole['Pole']['name'], array('controller'=>'poles','action' => 'view', $pole['Pole']['id']));
	                    		echo '<ul class="lessons-menu">';
	                    		foreach($pole['Learning'] as $learning) {
	                    			echo '<li>'.$this->Html->link($learning['name'], array('controller'=>'learnings','action' => 'view', $learning['id'])).'</li>';
	                    		}
								echo '</ul></li>';
	                    	} ?>
	                    </ul>
					</li>
					<li id="menu-item-help" class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='help') )?'active' :'' ?>">
						<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>Nous aider</p>'),
	                       array('controller'=>'pages','action' => 'help'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-friends" class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='friends') )?'active' :'' ?>">
						<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>Les amis</p>'),
	                       array('controller'=>'pages','action' => 'friends'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-about" class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='about') )?'active' :'' ?>">
						<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>A propos</p>'),
	                       array('controller'=>'pages','action' => 'about'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-imprint" class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='imprint') )?'active' :'' ?>">
						<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>Mentions légales</p>'),
	                       array('controller'=>'pages','action' => 'imprint'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-contact" class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='contact') )?'active' :'' ?>">
						<?php echo $this->Html->link('<div class="icon"></div>' . ' ' . __('<p>Contact</p>'),
	                       array('controller'=>'pages','action' => 'contact'),
	                       array('escape' => false)); ?>
					</li>
					<li id="menu-item-close">
						<?php echo $this->Html->image('icon_close.png', array('alt' => 'icon contact')); ?>
					</li>
				</ul>
			</div>

		</div>

		<div id="small_header" style="display:none">
			<?php 
				echo $this->Html->link($this->Html->image('logo.png', array('alt' => 'LOGO', 'width' => '60')),
               		array('controller'=>'pages','action' => 'dome'),
               		array('escape' => false)); 
				echo $this->Html->link($this->Html->image('icon_plus.png', array('alt' => 'icon plus', 'width' => '40')),
					'', array('id' => 'btn_showMenu', 'escape' => false)); 
            ?>
		</div>

		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="clear"></div>

		<div id="footer">
			<div id="social_footer">
				<a class="social_footer" id="social_facebook" href="https://www.facebook.com/" target="_blank"></a>
				<a class="social_footer" id="social_twitter" href="https://twitter.com/" target="_blank"></a>	
			</div>
		</div>

	</div>
	<?php echo $this->element('popup-congrats-inscription'); ?>
	<?php echo $this->element('popup-click-lessons'); ?>
	<?php echo $this->element('popup-choose-learning'); ?>
	<?php echo $this->element('popup-click-add-learning'); ?>
	<?php echo $this->element('popup-end-tutorial'); ?>
	
	<script src="//www.youtube.com/player_api"></script>
	<?php echo $this->Html->script('jquery-min'); ?>
	<?php echo $this->Html->script('jquery.bpopup.min'); ?>
	<?php echo $this->Html->script('app'); ?>
	<?php echo $this->Html->script('tiny_mce'); ?>
	

</body>
</html>
