/**
 * The Fifteen game control template
 */

jQuery(function($) {

	var active = false;

	$('.fifteen a.ajax').live('click', function(event) {
		event.preventDefault();
		event.stopImmediatePropagation();
		if (active || $.active) return;

		active = true;
		var payload;
		var delta = $(this).attr('rel').split(',');
		var img = $('img', this);
		img.css('z-index', 1000);
		img.animate({
			'left': delta[0] * (img.attr('width') + 1) + 'px',
			'top': delta[1] * (img.attr('height') + 1) + 'px'
		});
		img.queue(function() {
			active = false;
			if (payload) $.nette.success(payload);
		});

		$.post($.nette.href = this.href, function(data) {
			payload = data;
			if (!active) $.nette.success(payload);
		});

		$.nette.spinner.css({
			position: 'absolute',
			left: event.pageX,
			top: event.pageY
		});
	});

});
