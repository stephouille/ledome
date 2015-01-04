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
		echo $this->Html->css('style-admin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="wrapper_page">
			<div id="menu">
				<?php echo $this->Html->image('logo.png', array('id' => 'logo')); ?>
				<ul>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='index') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_dashboard.png') . ' ' . __('<p>Dashboard</p>'),
	                       array('controller'=>'admin','action' => 'index', 'admin' => false),
	                       array('escape' => false)); ?>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['controller']=='learnings') && ($this->params['action']=='index') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_learnings.png') . ' ' . __('<p>Apprentissages</p>'),
	                       array('controller'=>'learnings','action' => 'index', 'admin' => true),
	                       array('escape' => false)); ?>
					</li>
					<li class="<?php echo (!empty($this->params['action']) && ($this->params['action']=='allpages') )?'active' :'' ?>">
						<?php echo $this->Html->link($this->Html->image('icon_pages.png') . ' ' . __('<p>Pages</p>'),
	                       array('controller'=>'admin','action' => 'allpages', 'admin' => false),
	                       array('escape' => false)); ?>
					</li>
			    </ul>
			</div>
			<div id="wrapper_content">
				<div id="header">
					<?php echo $this->Html->link('Retour au site', array('controller'=>'pages','action' => 'dome', 'admin' => false), array('class' => 'button', 'id' => 'btn_backWebsite')); ?>
					<div id="wrapper_user">
					<?php echo $this->Html->image('avatar.jpg', array('id' => 'avatar_user')); ?>
					<p><?= $this->Session->read('Auth.User.username') ?></p>
					<?php echo $this->Html->link('Déconnexion', array('controller'=>'users','action' => 'logout', 'admin' => false), array('class' => 'button', 'id' => 'btn_logout')); ?>
					</div>
					<div class="clear"></div>
				</div>

				<div id="content">
					<div id="wrapper_content_admin">
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
					</div>
				</div>
				<div id="footer">
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<?php echo $this->Html->script('admin'); ?>
	<?php echo $this->Html->script('tiny_mce'); ?>
</body>
</html>
