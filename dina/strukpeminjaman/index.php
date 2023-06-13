<?php 
    session_start();
    
    function isLoggedIn() {
        if (isset($_SESSION['nama'])) {
            return true;
        } else {
            return false;
        }
    }

    if (!isLoggedIn()) {
        header("Location: ../index.php"); 
        exit();
    }
    
    // Ambil data lama peminjaman dari parameter GET
    $lamaPeminjaman = $_GET['lama'];

    // Tanggal peminjaman
    $tanggalPeminjaman = date('Y-m-d');

    // Hitung tanggal pengembalian berdasarkan lama peminjaman
    $tanggalPengembalian = date('Y-m-d', strtotime("+" . $lamaPeminjaman . " days", strtotime($tanggalPeminjaman)));

    // Nama peminjam
    $namaPeminjam = $_SESSION['nama'];

    // ID buku yang dipinjam
    $idBuku = $_GET['id'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "tugas_php");

    if ($conn->connect_error) {
        die("Terjadi kegagalan: " . $conn->connect_error);
    }

    // Query untuk mendapatkan data buku berdasarkan ID
    $query = "SELECT * FROM tabel_buku WHERE id = $idBuku";
    $hasil = $conn->query($query);

    if ($hasil->num_rows > 0) {
        while ($row = $hasil->fetch_assoc()) {
            $judulBuku = $row["judul"];
        }
    } else {
        $judulBuku = "Buku tidak ditemukan.";
    }

    // Simpan data peminjaman ke database atau lakukan operasi lain sesuai kebutuhan
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library Perkantas Sulut</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&family=Urbanist:ital,wght@1,300&family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap" rel="stylesheet"/>
</head>

<body>
    <header>
        <h1>E-Library Perkantas Sulut</h1>
        <p>A Good Book Is A Good Friend</p>
    </header>
    <navbar>
        <ul>
            <li><a href="../homePage/index.php">Home</a></li>
            <li><a href="../aboutpage/index.php">About Us</a></li>
            <li><a href="../contactpage/index.php">Contact</a></li>
            <li><a href="../uploadPage/index.php">Upload</a></li>
        </ul>
    </navbar>

    <main>
        <div class="bukti-peminjaman">
            <h1>Bukti Peminjaman</h1>
            <p>Nama Peminjam : <?php echo $namaPeminjam; ?></p>
            <p>Buku yang Dipinjam : <?php echo $judulBuku; ?></p>
            <p>Tanggal Peminjaman : <?php echo $tanggalPeminjaman; ?></p>
            <p>Tanggal Pengembalian : <?php echo $tanggalPengembalian; ?></p>
        </div>
    </main>

    <footer>
        <p>&copy; Kelompok 4 - Pemrograman Web - TIK2032G</p>
    </footer>

    <script src="main.js"></script>
</body>

</html>
