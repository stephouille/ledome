<!--  PAGE learnings / view -->
<div class="block_content">
	<div id="wrapper_learningPage">

		<?php 
			// debug($learning_user); 
		?>

		<form id="search_form">	
			<input type="text" data-learning="<?= $learning['Learning']['id'] ?>" name="search_learnings" id="search_learnings" placeholder="Rechercher un cours dans <?= $learning['Learning']['name'] ?>" />
		</form>

		<h2><?= $learning['Learning']['name'] ?></h2>

		<?php 
			if ($authUser) {
				if($isAddedToDome) {
					echo $this->Html->link('Supprimer de mon dôme', array('controller'=>'learnings','action' => 'remove_from_dome', $learning['Learning']['id']), array('class' => 'button', 'id' => 'btn_removeDome'));
				} else {
					echo $this->Html->link('Ajouter à mon dôme', array('controller'=>'learnings','action' => 'add_to_dome', $learning['Learning']['id']), array('class' => 'button', 'id' => 'btn_addDome')); 	
				}
			}
		?>

		<ul><!--
		<?php foreach ($learning['Video'] as $video): ?>
			--><li class="<?php if($learning_user != null && $learning_user['UsersLesson']['progress'] >= $video['position']) echo 'active'; ?>">
				<a href="<?= Router::url('/') ?>videos/view/<?= $video['id'] ?>">
					<?= $this->Html->image($video['Professor']['picture']); ?>
					<span class="position"><?= $video['position'] ?>.</span>
					<p><?= $video['title'] ?></p>
				</a>
			</li><!--
		<?php endforeach; ?>
		--></ul>
	</div>
</div>

<script type="text/javascript">

	$('#search_learnings').keyup(function(){
		var search_term = $('#search_learnings').val();
		var learning_id = $('#search_learnings').attr('data-learning');
		
		$('#wrapper_learningPage ul li').hide();
		$('#wrapper_learningPage ul li a p:icontains(\''+search_term+'\')').closest('li').show();

		/*if(search_term == '') {
			$('#content_search').html('');
		} else {
			$.ajax({
		        url: '../../videos/search',
		        type: "POST",
		        data: {
		            search : search_term,
		            learning_id : learning_id
		        },
		        dataType : 'json',
		        success : function(data) {
		        	$('#content_search').html('');
		        	for( var i = 0; i < data.lessons.length ; i++) {
		        		$('#content_search').append('<li><a href="/learnings/view/'+data.lessons[i]['Learning']['id']+'">'+data.lessons[i]['Learning']['name']+'</a></li>');
		        	}
		        	$("#content_search li a" ).each(function( index ) {
					  	hiliter(search_term, $(this));
					});
		        	
		           
		        }
		    });
		}*/
	   	
	});

</script>