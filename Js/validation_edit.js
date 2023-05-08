// WNA
function liveInput() {
	document.getElementById('negara_visible').style.display = 'block';
	document.getElementById('province').style.display = 'none';
	document.getElementById('province').required = false;
	document.getElementById('kota').required = false;
	var negara = document.getElementById('negara').options[1];
	negara.style.display = 'none';
}

// WNI
function disableInput() {
	document.getElementById('negara_visible').style.display = 'none';
	document.getElementById('province').style.display = 'block';
	var select = document.getElementById('negara');
	select.value = 'ID';
	var provinsi = document.getElementById('provinsi').options[1];
	provinsi.style.display = 'none';
	var wna_provinsi = document.getElementById('provinsi');
	wna_provinsi.remove(select.options.length - 1);
}
