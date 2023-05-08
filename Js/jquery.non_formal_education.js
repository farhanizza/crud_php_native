$(document).ready(function () {
	$('#provinsi').change(function () {
		var id_provinces = $(this).val();
		$.ajax({
			type: 'POST',
			url: 'insertNfe.php?jenis=kota',
			data: 'id_provinces=' + id_provinces,
			dataType: 'html',
			success: function (response) {
				$('select#kota').html(response);
			},
		});
	});
});

$(document).ready(function () {
	$('#provinsi').click(function (e) {
		e.preventDefault();
		$('#pilih_provinsi').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#kota').click(function (e) {
		e.preventDefault();
		$('#pilih_kota').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#tujuan_program').click(function (e) {
		e.preventDefault();
		$('#pilih_tujuan_program').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#konten_pelajari').click(function (e) {
		e.preventDefault();
		$('#pilih_materi').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#metode_pembelajaran').click(function (e) {
		e.preventDefault();
		$('#pilih_metode_pembelajaran').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#nama_instansi').click(function (e) {
		e.preventDefault();
		$('#pilih_nama_instansi').attr('disabled', 'disabled');
	});
});

$(document).ready(function () {
	$('#konten_pelajari').change(function (e) {
		e.preventDefault();
		var selectedOption = $('option:selected', this).text();
		if (selectedOption === 'Lainnya') {
			$('#pilih_materi_text').show();
			$('#konten_pelajari').hide();
		} else {
			$('#pilih_materi_text').hide();
			$('#konten_pelajari').show();
		}
	});
});

$(document).ready(function () {
	$('#tujuan_program').change(function (e) {
		e.preventDefault();
		var selectedOption = $('option:selected', this).text();
		if (selectedOption === 'Lainnya') {
			$('#tujuan_program_text').show();
			$('#tujuan_program').hide();
		} else {
			$('#tujuan_program_text').hide();
			$('#tujuan_program').show();
		}
	});
});

$(document).ready(function () {
	$('#metode_pembelajaran').change(function (e) {
		e.preventDefault();
		var selectedOption = $('option:selected', this).text();
		if (selectedOption === 'Lainnya') {
			$('#metode_pembelajaran_text').show();
			$('#metode_pembelajaran').hide();
		} else {
			$('#metode_pembelajaran_text').hide();
			$('#metode_pembelajaran').show();
		}
	});
});

$(document).ready(function () {
	$('#nama_instansi').change(function (e) {
		e.preventDefault();
		var selectedOption = $('option:selected', this).text();
		if (selectedOption === 'Lainnya') {
			$('#nama_instansi_text').show();
			$('#nama_instansi').hide();
		} else {
			$('#nama_instansi_text').hide();
			$('#nama_instansi').show();
		}
	});
});
