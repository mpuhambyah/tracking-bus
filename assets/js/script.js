$(function () {
	$('.tombolEditBus').on('click', function () {
		const id = $(this).data('id');

		$.ajax({
			url: base + '/admin/getubah',
			data: {
				id: id
			},
			method: 'post',
			dataType: 'json',
			success: function (data) {
				$('#name').val(data.name);
				$('#description').val(data.description);
				$('#image').attr('src', base + '/assets/img/' + data.image);
				$('#id').val(data.id);
			}
		})
	});
});
