<?php 
	// debug($lessons_user); 
?>


<div class="block_dome">
	<?php if (!$authUser) { ?>	
	<div id="block_noconnected">
		<div id="wrapper_noconnected">
			<p>Tote bag slow-carb kogi, viral next level Carles keffiyeh iPhone. Butcher meh mustache, Banksy umami meggings scenester selvage squid wolf.</p>
			<?php echo $this->Html->link("Je m'inscris", array('controller'=>'users','action' => 'add'), array('class' => 'button btn_connexion'));?>
			<?php echo $this->Html->link("Déjà inscrit ?", array('controller'=>'users','action' => 'login'), array('class' => ''));?>
		</div>
	</div>
	<?php } ?>
	<div id="drawing_dome">
		<!--<?php 
			$i = 0;
			foreach ($lessons_user as $l) : ?>
			<div class="item_dome" style="background-color:<?= $l['Pole']['color'] ?>;top:<?= $i*20+60 ?>px;left:<?= $i*20+60 ?>px;" data-id="<?= $i ?>"><?php echo $this->Html->link('', array('controller'=>'videos','action' => 'view', $l['Video']['id'])); ?></div>
		<?php 
			$i++;
			endforeach; ?>
		<div id="center_dome">
			<input id="test" type="file" name="test" style="visibility:hidden;position:absolute;top:0;left:0" onchange="document.getElementById('center_dome').innerHTML=this.value"> </div>-->
	</div>
</div>

<script type="text/javascript">
	
	$('#block_noconnected').width($(window).height() - 20);
	$('#block_noconnected').css('margin-left', -($(window).height() - 20) / 2);
	$('#block_noconnected').css('margin-top', -($(window).height() - 20) / 2);

</script>