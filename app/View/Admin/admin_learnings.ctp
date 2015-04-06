<?php 
// debug($learnings); 
?>

<div id="admin_learnings">

	<h1>Tous les apprentissages</h1>

	<h5>Tips :</h5>
	<ul>
		<li>Vous pouvez trier les vidéos en faisant un drag and drop (Plus besoin de s'occuper de la position en ajoutant les vidéos).</li>
	</ul>

	<?php foreach ($poles as $pole) { ?>

	<h3>
		<?= $pole['Pole']['name'] ?>
	</h3>

	<ul>
		<?php foreach ($pole['Learning'] as $learning) { ?>
			<li>
				<div class="heading_learning">
					<?php echo $this->Html->image($learning['image'], array('width' => '30px')); ?>
					<?= $learning['name'] ?>
					<div class="btn_heading">
						<?php echo $this->Html->image('down.png', array('url' => array('controller' => 'learnings', 'action' => 'down', $learning['id']), 'width' => '20')); ?>
						<?php echo $this->Html->image('up.png', array('url' => array('controller' => 'learnings', 'action' => 'up', $learning['id']), 'width' => '20')); ?>
						<?php echo $this->Html->link('Ajouter une vidéo', array('controller' => 'videos', 'action' => 'add', $learning['id']), array('class' => 'button')); ?>
						<?php echo $this->Html->link('Modifier', array('controller' => 'learnings', 'action' => 'edit', $learning['id']), array('class' => 'button')); ?>
						<?php echo $this->Html->link('Supprimer', array('controller' => 'learnings', 'action' => 'delete', $learning['id']), array('class' => 'button btn_deleteLearning')); ?>
					</div>
				</div>
				<ol class="sortable_videos" data-learning="<?= $learning['id'] ?>">
					<?php foreach ($learning['Video'] as $video) { ?>
						<li id="video_<?= $video['id'] ?>" data-learning="<?= $learning['id'] ?>" data-video="<?= $video['id'] ?>">
							<?= $video['title'] ?>
							<div class="fonctions_editions">
								<?php echo $this->Html->link('Modifier', array('controller' => 'videos', 'action' => 'edit', $video['id']), array('class' => 'link')); ?>
								<?php echo $this->Html->link('Supprimer', array('controller' => 'videos', 'action' => 'delete', $video['id']), array('class' => 'link')); ?>
							</div> 
						</li>		
					<?php } ?>
				</ol>
			</li>
		<?php } ?>
	</ul>

	<?php } ?>

	<div id="btn_admin_learnings">
	<?php echo $this->Html->link('Ajouter un apprentissage', array('controller' => 'learnings', 'action' => 'add'), array('class' => 'button')); ?>
	</div>

</div>

<script type="text/javascript">
	
	$( ".sortable_videos" ).sortable({
	    stop: function(event, ui ) {

	    	var learning_id = ui.item[0].dataset.learning;
	    	var videos = new Array();

	    	$('.sortable_videos[data-learning='+learning_id+'] li').each(function(index) {
	    		videos.push($(this).attr('data-video')) 
	    	});
	    	console.log(videos);

	    	$.ajax({
	            url: 'videos/changePosition',
	            type: "POST",
	            data: {
	            	videos : videos,
	            	learning_id : learning_id
	            },
	            dataType : 'json',
	            success : function(data) {
	            	alert('test')
	            }
	        });
	    }
	});



</script>