var protucts;

$(function() {
	protucts = new Protucts();
});

var Protucts = function () {
	this.registerEvents();
}

Protucts.prototype = {
	'registerEvents': function() {
		$('#menu_toggle').on('click', function(e) {
			e.preventDefault();
			if($('#wrapper').hasClass('active')) {
				$('#sidebar').hide();
				$('#ulToggleDisabled').show();
			} else {
				$('#sidebar').show();
				$('#ulToggleDisabled').hide();
			}
			$('#wrapper').toggleClass('active');
		});

		$('#categoria_ids')
			.find('option')
			.prop('selected', false)
			.end()
			.chosen();
	}
}
