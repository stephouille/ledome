<div class="block_content" id="index_all">

	<h3>Recommandations de l'équipe</h3>

	<?php echo $this->Html->link($recommendation['Video']['title'], array('controller'=>'videos','action' => 'view', $recommendation['Video']['id']));?>

	<h3><?= $nbVideos ?> vidéos</h3>

	<form id="search_form">	
		<input type="text" name="search_lessons" id="search_lessons" placeholder="Recherche" />
	</form>

	<!-- <ul id="content_search"></ul> -->

	<ul><!--
	<?php foreach($poles as $pole): ?>

		--><li class="pole_presentation">
			<h3><a href="<?= $this->Html->url(null, true); ?>/../poles/view/<?= $pole['Pole']['id'] ?>"><?= $pole['Pole']['name'] ?></h3>
			<ul>
				<?php foreach($pole['Learning'] as $video): ?>
				<li id="learning-<?= $video['id'] ?>">
					<?php echo $this->Html->link($video['name'], array('controller'=>'learnings','action' => 'view', $video['id']));?>
				</li>
				<?php endforeach; ?>
			</ul>
		</li><!--

	<?php endforeach; ?>
	--></ul>
</div>

<script type="text/javascript">

 	var url_base = "<?php echo $this->Html->url(null, true); ?>";

	$('#search_lessons').keyup(function(){
		var search_term = $('#search_lessons').val();

		$('.pole_presentation ul li').hide();
		$('.pole_presentation ul li:icontains(\''+search_term+'\')').show();
		/*if(search_term == '') {
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
		        		$('#content_search').append('<li><a href="'+url_base+'/../learnings/view/'+data.lessons[i]['Learning']['id']+'">'+data.lessons[i]['Learning']['name']+'</a></li>');
		        	}
		        	$("#content_search li a" ).each(function( index ) {
					  	hiliter(search_term, $(this));
					});
		        	
		           
		        }
		    });
		}*/
	   	
	});

</script>