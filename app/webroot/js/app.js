$(document).ready(function() {

	$("#menu #menu_lessons .menu-level1").hover(function() {
		$('.lessons-menu').hide();
		$(this).children('.lessons-menu').show();
	});

	function hiliter(word, element) {
	    var rgxp = new RegExp(word, 'gi');
	    var repl = '<span class="highlight">' + word + '</span>';
	    element.html(element.text().replace(rgxp, repl));
	}
	
	//POPUPS
	if(showPOPUP) {
		var popup = $('#popup-'+showPOPUP).bPopup({
			onClose: function() {
			}
		});
		$(document).on('click', '.finishTuto', function(){
			$.ajax({
	            url: 'users/stopPOPUP',
	            type: "POST",
	            dataType : 'json',
	            success : function(data) {
	            	popup.close();
	            }
	        });
		})
		if(showPOPUP == 'choose-learning') {
			$('#popup-'+showPOPUP).css('top', '75px');
			$('#learning-1').css({
				'position': 'relative',
				'z-index': 10000,
				'background': '#FFF',
				'border-radius': '15px',
				'height': '30px',
				'line-height': '30px',
			})
		} else if(showPOPUP == 'click-add-learning') {
			$('#btn_addDome').css({
				'position': 'relative',
				'z-index': 10000,
			});
		}
		$(document).on('click', '#btn_startTour', function(){
			popup.close();
			$('#menu-item-lessons').css({
				'z-index': 10000,
				'position': 'relative',
				'background': '#FFF'
			});
			$('#popup-click-lessons').bPopup();
		});
	}


	$('.button_login').click(function() {
		$('#form_login').show();
		$('#buttons_users').hide();
	});

	$('#menu-item-close').click(function() {
		$('#header').addClass('hidden');
		$('#header').animate({
			'margin-left': '-10%'
		}, 300);
		$('#content').animate({
			'width': '100%'
		}, 300);

		//small menu close
		setTimeout(function() {
			$('#small_header').fadeIn();
		}, 400);
	});

	$('#btn_showMenu').click(function() {
		$('#small_header').fadeOut(function() {
			//content animation
			$('#content').animate({
				'width': '90%'
			}, 300);

			//menu animation
			$('#header').animate({
				'margin-left': '0'
			}, 300);
		});

		return false;
	});

	tinyMCE.init({
		selector : ".bloc_notes",
		theme: "simple",
	});

});