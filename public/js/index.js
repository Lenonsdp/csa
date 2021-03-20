var app;

$(function() {
	app = new App();
});

var App = function () {
	this.registerEvents();
}

App.prototype = {
	'registerEvents': function() {
		$('#categoria_ids').find('option').end().chosen();

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

		$('.delete').on('click', function() {
			$('#comfirmDelete').val(0);
			let id = $(this).attr('data-id');
			$('#id').val(id);
			$('#comfirmDelete').val(id);

			$('.modal-body').empty().append(
				$('<p>', {'text': 'Deseja excluir esse produto?'})
			);
			$('.modal-title').empty().html('Aviso');
			$('#modalDelete').modal();
		});

		$('#comfirmDelete').on('click', function() {
			let id = $(this).val();
			$.ajax({
				url: 'http://127.0.0.1:8000/api/produto/' + id,
				type: 'DELETE',
				success: function (res) {
					$('#modalDelete').modal('hide');
					window.location.reload();
					return false;
				},
				error: function () {
					$('#comfirmDelete').val();

					$('.modal-body').empty().append(
						$('<p>', {'text': 'Ocorreu um problema na exclusão, tenten novamente mais tarde!'})
					);
					$('.modal-title').empty().html('Erro');
					$('.modal-footer').hide();
					$('#modalDelete').modal();
					return false;
				}
			});
		});
	}
}
