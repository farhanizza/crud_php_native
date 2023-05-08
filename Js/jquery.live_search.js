$(document).ready(function () {
	$('#search').keyup(function () {
		$.ajax({
			type: 'POST',
			url: 'search.php',
			data: {
				search: $(this).val(),
			},
			success: function (data) {
				$('#tampil').html(data);
			},
		});
	});
});
