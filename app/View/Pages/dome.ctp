<div class="block_dome">
	<?php if (!$authUser) { ?>	
	<div id="block_noconnected">
		<div id="wrapper_noconnected">
			<p>Inscrivez-vous pour sauvegarder votre progression et organiser les cours que vous souhaitez apprendre au sein de votre DOME. <?php echo $this->Html->link("?", array('controller'=>'pages','action' => 'about'), array('class' => ''));?></p>
			<?php echo $this->Html->link("Je m'inscris", array('controller'=>'users','action' => 'add'), array('class' => 'button btn_connexion'));?>
			<?php echo $this->Html->link("Déjà inscrit ?", array('controller'=>'users','action' => 'login'), array('class' => ''));?>
		</div>
	</div>
	<?php } ?>
	<div id="wrapper_dome">
		<canvas id="myCanvas"></canvas>
		<?php echo $this->Html->image('main_dome.png', array('alt' => 'main_dome', 'id' => "main_dome", 'usemap' => '#map_dome')); ?>
		<map name="map_dome">
			<?php 
				if ($authUser) {
					foreach ($zones as $zone) { 
						foreach ($lessons_user as $l) { ?>
							<area shape="poly" coords="<?= $zone['Zone']['coords'] ?>" href="" alt="area-<?= $zone['Zone']['id'] ?>" title="area-<?= $zone['Zone']['id'] ?>" class="area <?php if($l['Learning']['id'] == $zone['Zone']['learning_id']) echo 'active'; ?>" id="area-<?= $zone['Zone']['id'] ?>" color="<?= $zone['Zone']['color'] ?>" />
			<?php 		}	
					}
				} ?>
		</map>
	</div>
</div>

<script type="text/javascript">

	$('#buttons_users').hide();
	
	$('#block_noconnected').width($(window).height() - 20);
	$('#block_noconnected').css('margin-left', -($(window).height() - 20) / 2);
	$('#block_noconnected').css('margin-top', -($(window).height() - 20) / 2);

	//---------- LEDOME -----------

	// stores the device context of the canvas we use to draw the outlines
	// initialized in myInit, used in myHover and myLeave
	var hdc;

	// shorthand func
	function byId(e){return document.getElementById(e);}

	// takes a string that contains coords eg - "227,307,261,309, 339,354, 328,371, 240,331"
	// draws a line from each co-ord pair to the next - assumes starting point needs to be repeated as ending point.
	function drawPoly(coOrdStr)
	{
	    var mCoords = coOrdStr.split(',');
	    var i, n;
	    n = mCoords.length;

	    hdc.beginPath();
	    hdc.moveTo(mCoords[0], mCoords[1]);
	    for (i=2; i<n; i+=2)
	    {
	        hdc.lineTo(mCoords[i], mCoords[i+1]);
	    }
	    hdc.lineTo(mCoords[0], mCoords[1]);
	    hdc.fill();
	}

	function myHover(element)
	{
	    var coordStr = element.attr('coords');
	    var areaType = element.attr('shape');
	    var colorStroke = element.attr('color');

	    hdc.fillStyle = '#'+colorStroke;

	    drawPoly(coordStr);
	}

	function myLeave()
	{
	    var canvas = $('#myCanvas');
	    hdc.clearRect(0, 0, canvas.width, canvas.height);
	    $('.area.active').each(function() {
	        myHover($(this));
	    });
	}

	function myInit()
	{

	    // get the target image
	    var img = byId('main_dome');

	    var x,y, w,h;

	    // get it's position and width+height
	    x = img.offsetLeft;
	    y = img.offsetTop;
	    w = img.clientWidth;
	    h = img.clientHeight;

	    // move the canvas, so it's contained by the same parent as the image
	    var imgParent = img.parentNode;
	    var can = byId('myCanvas');
	    imgParent.appendChild(can);

	    var scale = w/500;
	    // make same size as the image (with scaling)
	    can.setAttribute('width', w+'px');
    	can.setAttribute('height', h+'px');

	    // get it's context
	    hdc = can.getContext('2d');

	    // set the 'default' values for the colour/width of fill/stroke operations
	    hdc.fillStyle = 'red';
	    hdc.strokeStyle = 'red';
	    hdc.lineWidth = 2;

	    // console.log($('#-area-0'));
	    $('.area.active').each(function() {
	        myHover($(this));
	    });

	    $('#block_dome').width(w);
	    $('#block_dome').height(h);
	    $('#myCanvas').css({
	        'transform': 'scale('+scale+')',
	        'top' : ((h-500)*scale)/2+'px',
	        'left' : ((h-500)*scale)/2+'px'
	    });
	    $('#wrapper_dome').width(w);

	    // $('.area').hover(function() { 
	    //     myHover($(this)); 
	    // }, function() {
	    //     // myLeave($(this));
	    // });
	   
	}
	myInit();

	$(function (){
        var inpParent = $('.input');

        if (!inpParent.length) return;

        inpParent.each(function (){
            var thisLine =  $(this),
                inpTxt =  thisLine.find('.txt-field'),
                inpCapt =  thisLine.find('.caption');

            function fIn() {
                inpTxt.parent().addClass('active');
            }
            function fOut() {
                if(inpTxt.val() != 0){

                }else{
                    inpTxt.parent().removeClass('active');
                }
            }

            inpTxt.focusin(fIn);
            inpTxt.focusout(fOut);
        })
    });
	


</script>