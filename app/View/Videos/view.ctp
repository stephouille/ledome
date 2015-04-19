<div id="content_player">
	<div id="header_player">

		<div id="navigation_videos">
			<ul>
			<?php 
				$nb_videos = count($alls);
				$i = 1;
				foreach ($alls as $v) : ?>

				<li class="item_nav_video <?php if($v['Video']['id'] == $video['Video']['id']) echo 'active'; ?>">
					<p class="title_video"><?= $v['Video']['title'] ?></p>
					<?php 
						// $percent = round(100 / $nb_videos) * $i;
						// if($i == $nb_videos)
						// 	$percent = 100;
						echo $this->Html->link('<span>'.$i.'/'.$nb_videos.'</span>', array('controller'=>'videos','action' => 'view', $v['Video']['id']), array('escape' => false));
						$i++;
					?>
				</li>

			<?php endforeach; ?>
			</ul>
			<div class="clear"></div>
		</div>
	</div>


	<div class="block_content big_content">
		
		<div class="block_video">

			<?= $video['Video']['iframe_video'] ?>
			
			<div id="right_player">
				
				<div id="header_right_player">
					<?php echo $this->Html->image($video['Learning']['image'], array('id' => 'img_learning')); ?>
					<h2><?= $video['Learning']['name'] ?> (<?= $video['Video']['position'] ?>/<?= count($alls) ?>)</h2>
					<div class="clear"></div>
					<div id="navigation_video">
						<?php 
							if($id_prev_video == null)
								$class = 'disabled';
							else 
								$class = '';

							echo $this->Html->link($this->Html->image("icon_prev.png"),
							    array('controller'=>'videos','action' => 'view', $id_prev_video),
							    array("escape" => false,'id' => 'btn_prev_video', "class" => 'btn_nav_video '.$class)
							);
						?>
						<?php 
							if($id_next_video == null)
								$class = 'disabled';
							else 
								$class = '';

							echo $this->Html->link($this->Html->image("icon_next.png"),
							    array('controller'=>'videos','action' => 'view', $id_next_video),
							    array("escape" => false,'id' => 'btn_next_video', "class" => 'btn_nav_video '.$class)
							);
						?>
						<?php 
						if ($authUser) {
							if($isAddedToDome) {
								echo $this->Html->link('Supprimer du dôme' ,
							    	array('controller'=>'learnings','action' => 'remove_from_dome', $video['Learning']['id']),
							    	array("escape" => false, 'id' => 'btn_addDome')
								);
							} else {
								echo $this->Html->link($this->Html->image("icon_addDome.png").'Ajouter au dôme' ,
							    	array('controller'=>'learnings','action' => 'add_to_dome', $video['Learning']['id']),
							    	array("escape" => false, 'id' => 'btn_addDome')
								);
							}
						}
						?>
					</div>
					
				</div>

				<div id="block_right_videopage">

					<?php echo $this->Form->create(null, array(
					    'url' => array('controller' => 'videos', 'action' => 'download')
					)); ?>

					<input type="hidden" name="data[Video][title]" value="<?= $video['Video']['title'] ?>">

					<div class="block_videopage active" id="summary">
						<?php if($video['Video']['description'] != null): ?>
							<h3>Description</h3>
							<?= $video['Video']['description'] ?>
						<?php endif; ?>
						<?php if($video['Video']['summary'] != null): ?>
							<h3>Sommaire</h3>
							<?= $video['Video']['summary'] ?>
						<?php endif; ?>
					</div>
					<div class="block_videopage" id="block_notes">	
					    <?php 
					    	if($notes != null) {
					    		$content_textarea = $notes['UsersNote']['notes'];
					    	} else {
					    		$content_textarea = $video['Video']['description'].'<br/><h3>Sommaire</h3>'.$video['Video']['summary'];
					    	}
					   		echo $this->Form->input('textarea', array('label' => '', 'type' => 'textarea', 'id' => 'bloc_notes', 'value' => $content_textarea) ); ?>
					</div>
					<div id="buttons_video_page">
						<?php echo $this->Form->submit('Télécharger les notes', array('class' => 'button', 'id' => 'btn_download_notes')); ?>
						<a href="javascript:void(0)" id="btn_take_notes" class="button take_notes">Prendre des notes</a>
					</div>

					
					<?php echo $this->Form->end(); ?>

				</div>

			</div>

		</div>
		<div class="clear"></div>

		<div id="infos_video">
			<h3><?= $video['Video']['title'] ?></h3>

			<div class="right_infos">
			
				<?php 
					if($video['Video']['difficulty'] == 1) {
						$name = 'Facile';
					} 
					if($video['Video']['difficulty'] == 2) {
						$name = 'Moyen';
					} 
					if($video['Video']['difficulty'] == 3) {
						$name = 'Difficile';
					} 
				?>
				<p class="difficulty"><?= $this->Html->image('icon_difficulty_'.$video['Video']['difficulty'].'.png'); ?><?= $name ?></p>

				<img id="image_professor" src="<?= $video['Professor']['picture'] ?>" width="50">
				<span class="name_professor"><?= $video['Professor']['name'] ?></span>

			</div><!--

			--><div class="buttons_professor">
				<a href="javascript:void(0)" class="button" id="btn_thanks">Merci</a>
				<a href="javascript:void(0)" class="button" id="btn_contact">Contact</a>
				<a href="javascript:void(0)" class="button" id="btn_more">...</a>
				<div id="show_more_button">
					<a href="javascript:void(0)" id="signal_link">Signaler un lien mort</a>
				</div>
			</div>
		</div>
		<div id="wrapper_annexes">
			<h3>ANNEXES</h3>

			<?php if(count($video['AnnexesVideo']) > 0): ?>

			<div class="swiper-button swiper-button-prev"></div>
		   	<div class="swiper-button swiper-button-next"></div>

			<div class="swiper-container">
			    <!-- Additional required wrapper -->
			    <div class="swiper-wrapper">
			        <!-- Slides -->
			        <?php foreach ($video['AnnexesVideo'] as $av): ?>
			        <div class="swiper-slide">
			        	<a href="<?= Router::url('/', true).'files/'.$av['video_id'].'/'.$av['path'] ?>" download>
			        		<?= $this->Html->image($list_annexes[$av['annexe_id']]); ?>
			        		<p><?= $av['path'] ?></p>
			        	</a>
			        </div>
			        <?php endforeach; ?>
			    </div>
			</div>
			<?php else: ?>
				<p>Pas d'annexes pour cette vidéo pour le moment.</p>
			<?php endif; ?>
			
		</div>
		
		<div class="clear"></div>

	</div>
</div>

<script src="http://www.youtube.com/player_api"></script>
<script type="text/javascript">

    var nb_videos = '<?php Print(count($alls)); ?>';
    var user_id = '<?php Print($user_id); ?>';
    var video_id = "<?php Print($video['Video']['id']); ?>";

    //Navigation
    $('.item_nav_video').width($('#navigation_videos').width() / nb_videos - 1);   
    $(window).resize(function() {
    	$('.item_nav_video').width($('#navigation_videos').width() / nb_videos - 1);   
    });

    $('#btn_download_notes').hide();
    $('#btn_take_notes').click(function() {
    	if($(this).hasClass('take_notes')) {
    		$(this).removeClass('take_notes');
    		$('.block_videopage').removeClass('active');
    		$('#block_notes').addClass('active');
    		$('#btn_download_notes').show();
    		$(this).html('Voir le sommaire');
    	} else {
    		$(this).addClass('take_notes');
    		$('.block_videopage').removeClass('active');
    		$('#summary').addClass('active');
    		$('#btn_download_notes').hide();
    		$(this).html('Prendre des notes');
    	}
    });

    $('#btn_thanks').click(function() {
    	$(this).addClass('done');
    });

 	var cke = CKEDITOR.replace( 'bloc_notes' );
	cke.on('change', function(e) {
		console.log( e.editor.getData() );
		if( user_id != null ) {
			$.ajax({
	            url: myBaseUrl + 'users/save_notes',
	            type: "POST",
	            data: {
	            	notes: e.editor.getData(),
	            	video_id: video_id
	            },
	            dataType : 'json',
	            success : function(data) {
	            	
	            }
	        });
		}
	});

	//slider annexes vidéo 
	var mySwiper = new Swiper ('.swiper-container', {
	    // Optional parameters
	    direction: 'horizontal',
	    // Navigation arrows
	    nextButton: '.swiper-button-next',
	    prevButton: '.swiper-button-prev',
	    slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 30,
        freeMode: true
	});  

	// $('#footer').css('visibility', 'hidden');

	$('#btn_more').click(function() {
		$('#show_more_button').show();
		$('#signal_link').click(function() {
			$.ajax({
	            url: myBaseUrl + 'videos/broken_link',
	            type: "POST",
	            data: {
	            	video_id: video_id
	            },
	            dataType : 'json',
	            success : function(data) {
	            	if(data.status == "OK") {
	            		alert('un email a été envoyé à l administrateur du site');
	            	}
	            }
	        });
		});
	});
	$(document).mouseup(function (e) {
	    var container = $("#show_more_button");
	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	        container.hide();
	    }
	});
    
</script>