// $(document).ready(function () {
// 	$('#provinsi').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_provinsi').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#kota').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_kota').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#tujuan_program').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_tujuan_program').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#konten_pelajari').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_materi').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#metode_pembelajaran').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_metode_pembelajaran').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#nama_instansi').click(function (e) {
// 		e.preventDefault();
// 		$('#pilih_nama_instansi').attr('disabled', 'disabled');
// 	});
// });

// $(document).ready(function () {
// 	$('#tujuan_program').change(function (e) {
// 		e.preventDefault();
// 		var selectedOption = $('option:selected', this).text();
// 		if (selectedOption === 'Lainnya') {
// 			$('#tujuan_program_text').show();
// 			// $('#tujuan_program_text').attr('required', true);
// 			$('#tujuan_program').hide();
// 		} else {
// 			$('#tujuan_program_text').hide();
// 			// $('#tujuan_program_text').attr('required', false);
// 			$('#tujuan_program').show();
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$('#konten_pelajari').change(function (e) {
// 		e.preventDefault();
// 		var selectedOption = $('option:selected', this).text();
// 		if (selectedOption === 'Lainnya') {
// 			$('#pilih_materi_text').show();
// 			// $('#pilih_materi_text').prop('required', true);
// 			$('#konten_pelajari').hide();
// 		} else {
// 			$('#pilih_materi_text').hide();
// 			// $('#pilih_materi_text').prop('required', false);
// 			$('#konten_pelajari').show();
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$('#metode_pembelajaran').change(function (e) {
// 		e.preventDefault();
// 		var selectedOption = $('option:selected', this).text();
// 		if (selectedOption === 'Lainnya') {
// 			$('#metode_pembelajaran_text').show();
// 			// $('#metode_pembelajaran_text').prop('required', true);
// 			$('#metode_pembelajaran').hide();
// 		} else {
// 			$('#metode_pembelajaran_text').hide();
// 			// $('#metode_pembelajaran_text').prop('required', false);
// 			$('#metode_pembelajaran').show();
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$('#nama_instansi').change(function (e) {
// 		e.preventDefault();
// 		var selectedOption = $('option:selected', this).text();
// 		if (selectedOption === 'Lainnya') {
// 			$('#nama_instansi_text').show();
// 			// $('#nama_instansi_text').prop('required', true);
// 			$('#nama_instansi').hide();
// 		} else {
// 			$('#nama_instansi_text').hide();
// 			// $('#nama_instansi_text').prop('required', false);
// 			$('#nama_instansi').show();
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$('form').submit(function (e) {
// 		var start_date = new Date($('#start_date').val());
// 		var end_date = new Date($('#end_date').val());

// 		if (end_date <= start_date) {
// 			alert('Selesai pelaksaanan tidak bisa lebih awal dari mulai pelaksaanan');
// 			$('#end_date').val('');
// 			e.preventDefault();
// 		}
// 	});
// });

// $(document).ready(function () {
// 	$('#deksripsi').change(function (e) {
// 		let textAreaValue = $(this).val();
// 		if (textAreaValue > 150) {
// 			alert('Karakter tidak boleh lebih besar dari 150!');
// 			e.preventDefault();
// 		}
// 	});
// });
