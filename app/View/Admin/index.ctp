<div id="wrapper_stats">

	<h2>Statistiques</h2>

	<p>Nombre d'utilisateurs : <?= $nbUsers ?></p>

	<p>Nombre total de cours : <?= $nbLearnings ?></p>
	<p>Nombre total de vidéos : <?= $nbVideos ?></p>

</div><!--

--><div id="block_links">

	<h2>Liens directs</h2>
	<?php echo $this->Html->link('Ajouter un pôle', array('controller' => 'poles','action' => 'add', 'admin' => false));?>
	<?php echo $this->Html->link('Ajouter un apprentissage', array('controller' => 'learnings','action' => 'add'));?>


	<h2>Recommendation de l'équipe</h2>
	<?php if( count($recommendation) > 0 ): ?>
		<p id="name_recommendation"><?= $recommendation['Video']['title'] ?></p>
	<?php else: ?>
		<p>Pas de recommendation pour le moment.</p>
	<?php endif; ?>
	<a href="javascript:void(0)" class="btn btn-primary" id="update_recommendation">Modifier</a>
	
	<div id="form_update_recommendation" style="display:none;">
		<select class="form-control">
			<?php foreach($learnings as $learning):  ?>
				<optgroup label="<?= $learning['Learning']['name'] ?>">
					<?php foreach($learning['Video'] as $video):  ?>
						<option value="<?= $video['id'] ?>"><?= $video['title'] ?></otion>
					<?php endforeach;  ?>
				</optgroup>
			<?php endforeach;  ?>
		</select>
		<br/>
		<a href="javascript:void(0)" class="btn btn-primary" id="btn_update_recommendation">Modifier</a>
	</div>

</div>

<script type="text/javascript">

	$('#update_recommendation').click(function() {
		$('#form_update_recommendation').show();
		$(this).hide();

		$('#btn_update_recommendation').click(function() {
			var id_video_rec = $('#form_update_recommendation select').val();
			$.ajax({
	            url: window.WEB_URL + 'admin/videos/changeRecommendation',
	            type: "POST",
	            data: {
	                id_video_rec : id_video_rec
	            },
	            dataType : 'json',
	            success : function(data) {
	            	$('#name_recommendation').html(data.recommendation.Video.title);
	            	$('#form_update_recommendation').hide();
	            	$('#update_recommendation').show();
	            }
	        });
		});
	});
	

</script>