(function($, window, document) {
	$(function() {

		const ajaxLoader = $('#detail main .ajax-loader');
		const userDetails = $('#detail main .user-details');
		const addUserForm = $('#add-user-form');

		addUserForm.on('submit', function(event) {
			event.preventDefault();

			ajaxLoader.show();

			const data = $(this).serializeArray();

			$.ajax({
				type: 'post',
				url: '/users/save',
				data,
				dataType: 'json',
				encode: true,
			})
				.done(function(data, textStatus, jqXHR) {
					const validationErrorsElement = addUserForm.find('.validation-errors');
					validationErrorsElement
						.find('.error-list')
						.remove();

					if (data.length > 0) {
						const htmlErrors = data
							.map((error) => {
								return `<div class="error-list">${error}</div>`;
							})
							.join('');

						validationErrorsElement.html(htmlErrors);
						ajaxLoader.hide();

						return;
					}

					window.location.replace('/users/show');
				})
				.fail(function(jqXHR, textStatus, errorThrown) {
					console.info('error');
					console.info(textStatus);
					console.info(errorThrown);
					ajaxLoader.hide();
				})
		});

		$('.active.delete-user').on('click', function(event) {
			event.preventDefault();

			if (!confirm("Are you sure delete this user?") === true) {
				return;
			}

			ajaxLoader.show();

			const id = $(this).closest('tr').data('id');

			$.ajax({
				type: 'post',
				url: '/users/delete',
				data: {id,},
				dataType: 'json',
				encode: true,
			})
				.done(function(data, textStatus, jqXHR) {
					window.location.reload();
				})
				.fail(function(jqXHR, textStatus, errorThrown) {
					console.info('error');
					console.info(textStatus);
					console.info(errorThrown);
					ajaxLoader.hide();
				})
		});

		$('.username-cell').click(function(event) {
			event.preventDefault();

			ajaxLoader.show();

			const id = $(this).closest('tr').data('id');

			$.ajax({
				type: 'post',
				url: '/users/details',
				data: {id,},
				dataType: 'html',
				encode: true,
			})
				.done(function(data, textStatus, jqXHR) {
					userDetails
						.show()
						.append(data)
						.children('span')
						.click(function(event) {
							$(this)
								.siblings('table')
								.remove();
							userDetails.hide();
						})

				})
				.fail(function(jqXHR, textStatus, errorThrown) {
					console.info('error');
					console.info(textStatus);
					console.info(errorThrown);
				})
				.always(function(jqXHR, textStatus, errorThrown) {
					ajaxLoader.hide();
				});
		});

	});
}(window.jQuery, window, document));
