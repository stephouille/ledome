<!-- Page pôle view (catégorie) -->

<div class="block_content">
	<div id="wrapper_polePage">

		<div class="filarianne">
			<?= $this->Html->link('Tous les cours', array('controller' => 'lessons', 'action' => 'index')); ?> > <?= $pole['Pole']['name'] ?>
		</div>

		<form id="search_form">	
			<input type="text" name="search_learnings" id="search_learnings" placeholder="Rechercher un cours dans la catégorie <?= $pole['Pole']['name'] ?>" />
		</form>

		<h2><?= $pole['Pole']['name'] ?></h2>

		<ul>
		<?php 
			$i = 1;
			foreach ($pole['Learning'] as $learning) { ?>
			<li class="<?php if($userslessons != null && in_array($learning['id'], $userslessons)) { echo 'active'; } ?>">
				<a href="<?= Router::url('/') ?>learnings/view/<?= $learning['id'] ?>">
					<?php echo $this->Html->image($learning['image']); ?>
					<p><?= $learning['name'] ?></p>
				</a>
			</li>
		<?php 
			$i++;
		} ?>
		</ul>

	</div>
</div>

<script type="text/javascript">

 	var url_base = document.location.origin+"<?= Router::url('/') ?>";

	$('#search_learnings').keyup(function() {

		var search_term = $('#search_learnings').val();
		$('#wrapper_polePage ul li').hide();
		$('#wrapper_polePage ul li a p:icontains(\''+search_term+'\')').closest('li').show();
	   	
	});

</script>