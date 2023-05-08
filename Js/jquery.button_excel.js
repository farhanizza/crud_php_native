$(document).ready(function () {
	$('#button_excel').click(function () {
		$('#table_excel').table2excel({
			exclude: '.noExl',
			name: 'data',
			filename: 'data',
			fileext: '.xlsx',
			exclude_img: false,
			exclude_links: true,
			exclude_inputs: false,
			preserveColors: false,
		});
	});
});
