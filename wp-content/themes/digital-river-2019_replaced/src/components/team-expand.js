let els;

let _$;

export function init($) {
	_$ = $;

	els = document.querySelectorAll('.team-flex');

	if (!els.length) {
		return;
	}

	_$('.team-hover').click(function () {

		// get the panel id
		const contentPanelId = _$(this).attr('id');
		const $this = _$(this);

		// Close the current item if clicked
		if ($this.hasClass('active')) {
			$this.removeClass('active');
			_$('.team-content').removeClass('active');
			_$('.team-hover').removeClass('darkened');
		}

		// Open if not already active
		else {
			_$('.team-hover').addClass('darkened');
			$this.addClass('active');
			$this.removeClass('darkened');
			_$('.team-content').removeClass('active');
			_$('#team-content-' + contentPanelId).toggleClass('active');		
			// Scroll to the description
			 event.preventDefault()
			 $('html, body').animate({
			 		scrollTop: $($('#team-content-' + contentPanelId)).offset().top -200,
			 	},
			 	250,
			 	'linear'
			 )

		}
	});

	// Close button functionality
	_$('.team-content .close').click(function () {
		_$('.team-content').removeClass('active');
		_$('.team-hover').removeClass('darkened');
	});
}
