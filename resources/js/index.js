var protucts;

$(function() {
	protucts = new Protucts('painel_base');
});

var Protucts = function () {
	this.registerEvents();
}

Protucts.prototype = {
	'registerEvents': function() {
		$('#menu-toggle').on('click', function(e) {
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
	}
}
