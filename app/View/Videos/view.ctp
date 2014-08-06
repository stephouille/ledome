<div class="block_content big_content">
	<h2><?= $video['Learning']['name'] ?></h2>

	<div id="navigation_videos">
		<ul>
		<?php foreach ($alls as $v) : ?>

			<li class="item_nav_video <?php if($v['Video']['id'] == $video['Video']['id']) echo 'active'; ?>">
				<!-- <p class="title_video"><?= $v['Video']['title'] ?></p> -->
				<?php echo $this->Html->link($v['Video']['position'], array('controller'=>'videos','action' => 'view', $v['Video']['id']));?>
			</li>

		<?php endforeach; ?>
		</ul>
	</div>
	
	<div class="left block_video">

		<div id="player"></div>
		<script src="http://www.youtube.com/player_api"></script>
		
		<h3><?= $video['Video']['title'] ?></h3>

		<div id="bottom_video"> <!-- Onglets Description de la vidéo / documents annexes -->
			<div class="tab">
				<a href="javascript:void(0)" class="active" data-tab="desc">Description</a>
				<a href="javascript:void(0)" data-tab="doc">Documents annexes</a>
			</div>
			<div class="content_tabs">
				<div class="content_tab active" data-tab="desc">
					<p><?= $video['Video']['description'] ?></p>
				</div>
				<div class="content_tab" data-tab="doc">
					<?php echo $this->Html->link('Télécharger', '/files/test.pdf', array('class' => 'button', 'target' => '_blank')); ?> 
				</div>
			</div>
		</div>
		

	</div>

	<div class="right block_notes">
		<?php 
		echo $this->Form->create(null, array(
		    'url' => array('controller' => 'videos', 'action' => 'download')
		)); ?>
	    <?php echo $this->Form->input('textarea', array('label' => '', 'type' => 'textarea', 'class' => 'bloc_notes') ); ?>
	    <?php echo $this->Form->submit(__('Télécharger'), array('class' => 'button')); ?>
		<?php echo $this->Form->end(); ?>

		<?php echo $this->Html->link('Valider le cours', array('controller'=>'videos','action' => 'validation', $video['Video']['id']), array('class' => 'button'));?>
	
		
	</div>
	<div class="clear"></div>

	

</div>

<script type="text/javascript">

    // create youtube player
    var player;
    function onYouTubePlayerAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: "<?php print($video['Video']['id_youtube']); ?>",
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
    }

    // autoplay video
    function onPlayerReady(event) {
    //event.target.playVideo();
    }

    // when video ends
    function onPlayerStateChange(event) {        
        if(event.data === 0) {            
            alert('done');
        }
    }


    //Navigation
    $('.item_nav_video').width($('#navigation_videos').width() / 3 - 4);

    //Onglets de la page
    $('#bottom_video .tab a').click(function() {
    	var tab = $(this).attr('data-tab');
    	$('#bottom_video .tab a').removeClass('active');
    	$('#bottom_video .tab a[data-tab='+tab+']').addClass('active');

    	$('.content_tab').removeClass('active');
    	$('.content_tab[data-tab='+tab+']').addClass('active');
    });



    
</script>