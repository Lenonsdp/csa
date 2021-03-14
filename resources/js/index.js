$(function() {
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
});
