function confirmDelete() {
	var confirmation = confirm('Apakah kamu yakin ingin menghapus data ini?');
	if (confirmation) {
		alert('Berhasil di hapus');
		return true;
	} else {
		alert('Gagal di hapus');
		return false;
	}
}

// onclick="return confirmDelete()"
