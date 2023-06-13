function buktiPeminjaman() {
    const lamaPinjam = document.getElementById('select');

    if (lamaPinjam.selectedIndex === -1) {
        alert('Silahkan pilih berapa lama peminjaman !');
        return;
    } else {
        window.location.href = '../strukpeminjaman/index.html';
        return;
    }
}
  