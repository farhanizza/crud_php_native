$(document).ready(function () {
	$('#provinsi').change(function () {
		var id_provinces = $(this).val();
		$.ajax({
			url: 'insert.php',
			type: 'POST',
			data: {
				id_provinces: id_provinces,
			},
			cache: false,
			success: function (success) {
				$('select#kota').html(success);
			},
		});
	});
});
