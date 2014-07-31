<div class="block_content">

	<h3>Recommandations de l'équipe</h3>

	<?php echo $this->Html->link($recommendation['Video']['title'], array('controller'=>'videos','action' => 'view', $recommendation['Video']['id']));?>

	<h3><?= $nbVideos ?> vidéos</h3>

	<form id="search_form">	
		<input type="text" name="search_lessons" id="search_lessons" placeholder="Recherche" />
		<!-- <input type="submit" value="Rechercher" id="btn_search" /> -->
	</form>

	<ul id="content_search"></ul>

	<ul>
	<?php foreach($poles as $pole): ?>

		<li class="pole_presentation"><?= $pole['Pole']['name'] ?>
			<ul>
				<?php foreach($pole['Video'] as $video): ?>
				<li><?php echo $this->Html->link($video['title'], array('controller'=>'videos','action' => 'view', $video['id']));?></li>
				<?php endforeach; ?>
			</ul>
		</li>

	<?php endforeach; ?>
	</ul>
</div>