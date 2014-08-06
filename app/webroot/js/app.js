$(document).ready(function() {

	$("#menu #menu_lessons .menu-level1").hover(function() {
		$('.lessons-menu').hide();
		$(this).children('.lessons-menu').show();
	});
	

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

	function hiliter(word, element) {
	    var rgxp = new RegExp(word, 'gi');
	    var repl = '<span class="highlight">' + word + '</span>';
	    element.html(element.text().replace(rgxp, repl));
	}
	

	// setTimeout(function(){
	// 	$('#content').animate({
	// 		'width': '90%'
	// 	}, 300);
	// 	$('#header').animate({
	// 		'margin-left': '0'
	// 	}, 300);
	// }, 1000);

	// changer le background en fonction de l'heure de la journée
	var d = new Date();
	var n = d.getHours();

	if(n >= 6 || n < 7) {	//Lever du jour
		$('#container').removeClass();
		$('#container').addClass('sunrise');
	}
	if(n >= 7 || n < 19) {	//Jour 
		$('#container').removeClass();
		$('#container').addClass('day');
	}
	if(n >= 19 || n < 20) {	//Coucher du soleil
		$('#container').removeClass();
		$('#container').addClass('sunset');
	}
	if(n >= 20 || n < 21) {	//Fin du Coucher du soleil
		$('#container').removeClass();
		$('#container').addClass('endsunset');
	}
	if(n >= 21 || n < 6) {	//Nuit
		$('#container').removeClass();
		$('#container').addClass('night');
	}


	$('.button_login').click(function() {
		$('#form_login').show();
		$('#buttons_users').hide();
	});


	$('#menu-item-close').click(function() {
		if($('#header').hasClass('hidden')) {
			$('#header').removeClass('hidden');
			$('#content').animate({
				'width': '90%'
			}, 300);
			$('#header').animate({
				'margin-left': '0'
			}, 300);
		} else {
			$('#header').addClass('hidden');
			$('#header').animate({
				'margin-left': '-10%'
			}, 300);
			$('#content').animate({
				'width': '100%'
			}, 300);
		}
	});

	tinyMCE.init({
		selector : ".bloc_notes",
		theme: "simple",
	});

	



	/* ----------------- Page dome ---------------- */
	// $('#drawing_dome')

	// var params = {
	//     allowScriptAccess: "always"
	// };
	// var atts = {
	//     id: "myytplayer"
	// };

	// var video = swfobject.embedSWF("http://www.youtube.com/v/elvOZm0d4H0?enablejsapi=1&playerapiid=ytplayer&version=3&rel=0&autoplay=1&controls=1", "ytapiplayer", "450", "250", "8", null, null, params, atts);

	// onYouTubePlayerReady = function (playerId) {
	//     ytplayer = document.getElementById("myytplayer");
	//     ytplayer.addEventListener("onStateChange", "onPlayerStateChange");
	// };

	// onPlayerStateChange = function (state) {
	//     if (state === 0) {
	//         alert("Stack Overflow rocks!");
	//     }
	// };



});