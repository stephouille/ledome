<div class="block_content big_content" id="content_player">
	<h2><?= $video['Learning']['name'] ?></h2>

	<div id="navigation_videos">
		<ul>
		<?php 
			$nb_videos = count($alls);
			$i = 0;
			foreach ($alls as $v) : ?>

			<li class="item_nav_video <?php if($v['Video']['id'] == $video['Video']['id']) echo 'active'; ?>">
				<p class="title_video"><?= $v['Video']['title'] ?></p>
				<?php 
					$percent = round(100 / $nb_videos) * $i;
					if($i == $nb_videos)
						$percent = 100;
					echo $this->Html->link($percent.'%', array('controller'=>'videos','action' => 'view', $v['Video']['id']));
					$i++;
				?>
			</li>

		<?php endforeach; ?>
		</ul>
		<div class="clear"></div>
	</div>
	
	<div class="left block_video">

		<div id="player"></div>
		
		<div id="infos_video">
			<?php 
				if($id_prev_video != null)
					echo $this->Html->link('', array('controller'=>'videos','action' => 'view', $id_prev_video), array('id' => 'btn_prev_video', 'class' => 'btn_nav_video'));
				else 
					echo $this->Html->image('icon_arrow_left.png', array('width' => '50'));

			?>
			<div id="wrapper_infos_video">
				<img src="<?= $video['Professor']['picture'] ?>" width="50">
				<span class="name_professor"><?= $video['Professor']['firstname'] ?> <?= $video['Professor']['lastname'] ?></span>
				<h3><?= $video['Video']['title'] ?></h3>
			</div>
			<?php 
				if($id_next_video != null)
					echo $this->Html->link('', array('controller'=>'videos','action' => 'view', $id_next_video), array('id' => 'btn_next_video', 'class' => 'btn_nav_video'));
				else 
					echo $this->Html->image('icon_arrow_right.png', array('width' => '50'));
			?>
		</div>

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

	<div id="block_right_videopage" class="right">

		<?php echo $this->Form->create(null, array(
		    'url' => array('controller' => 'videos', 'action' => 'download')
		)); ?>

		<div class="block_videopage active" id="summary">
			<?= $video['Video']['summary'] ?>
		</div>
		<div class="block_videopage" id="block_notes">	
		    <?php echo $this->Form->input('textarea', array('label' => '', 'type' => 'textarea', 'class' => 'bloc_notes') ); ?>
		</div>
		<div id="buttons_video_page">
			<a href="javascript:void(0)" id="btn_take_notes" class="button take_notes">Prendre des notes</a>
			<?php echo $this->Form->submit('Télécharger les notes', array('class' => 'button', 'id' => 'btn_download_notes')); ?>
		</div>

		
		<?php echo $this->Form->end(); ?>

	</div>
	<div class="clear"></div>

</div>

<script src="http://www.youtube.com/player_api"></script>
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
            // alert('done');
        }
    }

    var nb_videos = '<?php Print(count($alls)); ?>';

    //Navigation
    $('.item_nav_video').width($('#navigation_videos').width() / nb_videos - 1);

    //Onglets de la page
    $('#bottom_video .tab a').click(function() {
    	var tab = $(this).attr('data-tab');
    	$('#bottom_video .tab a').removeClass('active');
    	$('#bottom_video .tab a[data-tab='+tab+']').addClass('active');

    	$('.content_tab').removeClass('active');
    	$('.content_tab[data-tab='+tab+']').addClass('active');
    });


    $('#btn_take_notes').click(function() {
    	if($(this).hasClass('take_notes')) {
    		$(this).removeClass('take_notes');
    		$('.block_videopage').removeClass('active');
    		$('#block_notes').addClass('active');
    		$(this).html('Voir le sommaire');
    	} else {
    		$(this).addClass('take_notes');
    		$('.block_videopage').removeClass('active');
    		$('#summary').addClass('active');
    		$(this).html('Prendre des notes');
    	}
    });



    
</script>