<div class="block_content big_content">

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
	<h1><?= $video['Video']['title'] ?></h1>
	<div class="left block_video">

		<div id="player"></div>
		<script src="http://www.youtube.com/player_api"></script>
		<script>
		    
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
		    
		</script>

		<h3>Documents annexes : </h3>
		<?php echo $this->Html->link('Télécharger', '/files/test.pdf', array('class' => 'button', 'target' => '_blank')); ?> 

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