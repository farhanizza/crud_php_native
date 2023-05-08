$(document).ready(function () {
	$('#provinsi').change(function () {
		var id_provinces = $(this).val();
		$.ajax({
			type: 'POST',
			dataType: 'html',
			url: 'edit_data.php?jenis=kota',
			data: 'id_provinces=' + id_provinces,
			success: function (response) {
				$('select#kota').html(response);
				getAjaxKota();
			},
		});
	});
});
