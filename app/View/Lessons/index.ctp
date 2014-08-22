<div class="block_content">

	<h3>Recommandations de l'équipe</h3>

	<?php echo $this->Html->link($recommendation['Video']['title'], array('controller'=>'videos','action' => 'view', $recommendation['Video']['id']));?>

	<h3><?= $nbVideos ?> vidéos</h3>

	<form id="search_form">	
		<input type="text" name="search_lessons" id="search_lessons" placeholder="Recherche" />
		<!-- <input type="submit" value="Rechercher" id="btn_search" /> -->
	</form>
	<div class="clear"></div>

	<ul id="content_search"></ul>

	<ul>
	<?php foreach($poles as $pole): ?>

		<li class="pole_presentation">
			<h3><?= $pole['Pole']['name'] ?></h3>
			<ul>
				<?php foreach($pole['Learning'] as $video): ?>
				<li><?php echo $this->Html->link($video['name'], array('controller'=>'learnings','action' => 'view', $video['id']));?></li>
				<?php endforeach; ?>
			</ul>
		</li>

	<?php endforeach; ?>
	</ul>
</div>

<script type="text/javascript">

	$('#search_lessons').keyup(function(){
		var search_term = $('#search_lessons').val();
		if(search_term == '') {
			$('#content_search').html('');
		} else {
			$.ajax({
		        url: 'lessons/search',
		        type: "POST",
		        data: {
		            search : search_term,
		        },
		        dataType : 'json',
		        success : function(data) {
		        	$('#content_search').html('');
		        	for( var i = 0; i < data.lessons.length ; i++) {
		        		$('#content_search').append('<li><a href="/le_dome/videos/view/'+data.lessons[i]['Video']['id']+'">'+data.lessons[i]['Video']['title']+'</a></li>');
		        	}
		        	$("#content_search li a" ).each(function( index ) {
					  	hiliter(search_term, $(this));
					});
		        	
		           
		        }
		    });
		}
	   	
	});

</script>