<?php 
	// debug($lessons_user); 
?>


<div class="block_dome">
	<?php if (!$authUser) { ?>	
	<div id="block_noconnected">

		<?php echo $this->Html->link("Je m'inscris", array('controller'=>'users','action' => 'add'), array('class' => 'button'));?>
		<?php echo $this->Html->link("Déjà inscrit ?", array('controller'=>'users','action' => 'login'), array('class' => ''));?>

	</div>
	<?php } ?>
	<div id="drawing_dome">
		<?php 
			$i = 0;
			foreach ($lessons_user as $l) : ?>
			<div class="item_dome" style="background-color:<?= $l['Pole']['color'] ?>;top:<?= $i*20+60 ?>px;left:<?= $i*20+60 ?>px;" data-id="<?= $i ?>"><?php echo $this->Html->link('', array('controller'=>'videos','action' => 'view', $l['Video']['id'])); ?></div>
		<?php 
			$i++;
			endforeach; ?>
		<div id="center_dome">
			<input id="test" type="file" name="test" style="visibility:hidden;position:absolute;top:0;left:0" onchange="document.getElementById('center_dome').innerHTML=this.value"> </div>
	</div>
</div>