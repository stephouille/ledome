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
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('knacss');
		echo $this->Html->css('styleAdmin');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container" class="pure-g">
		<div id="header" class="pure-u-1-5">
			<div class="pure-menu pure-menu-open">
				<div id="member_admin">
					<?php echo $this->Html->image('avatar.jpg', array('alt' => 'icon lessons')); ?>
					<?php echo $this->Html->link('Déconnexion', array('controller'=>'admin','action' => 'logout'), array('title' => 'logout')); ?>
				</div>
			    <!-- <a class="pure-menu-heading">ADMIN le dome</a> -->
			    <ul>
			        <!-- <li><a href="#">Statistiques</a></li> -->
			        <li><a href="#">Apprentissages</a></li>
			        <!-- <li class="pure-menu-heading">More Sites!</li> -->
			    </ul>
			</div>
		</div>
		<div id="content" class="pure-u-4-5">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<?php echo $this->Html->script('admin'); ?>
</body>
</html>
