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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Info Buku</title>
</head>
<body>
    <header>
        <h1>E-Library Perkantas Sulut</h1>
        <p>A Good Book Is A Good Friend</p>
    </header>
    <nav>
        <a href="../homePage/index.php">Home</a>
        <a href="../aboutpage/index.php">About Us</a>
        <a href="../contactpage/index.php">Contact</a>
        <a href="../uploadPage/index.php">Upload</a>
    </nav>

    <main>
        <div class="item">
            <?php 
                $conn = new mysqli("localhost", "root", "", "tugas_php");

                if ($conn->connect_error) {
                    die("Terjadi kegagalan: " . $conn->connect_error);
                }

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $query = "SELECT * FROM tabel_buku WHERE id = $id";
                    $hasil = $conn->query($query);

                    if ($hasil->num_rows > 0) {
                        while ($row = $hasil->fetch_assoc()) {
                            $judul = $row["judul"];
                            $deskripsi = $row["deskripsi"];
                            $sampul = $row["sampul"];

                            echo '<h3>' . $judul . '</h3>';
                            echo '<figure>';
                            echo '<img src="../uploadPage/' . $sampul . '" alt="' . $judul . '">';
                            echo '</figure>';
                            echo '<p class="special">' . $deskripsi . '</p>';
                        }
                    } else {
                        echo 'Buku tidak ditemukan.';
                    }
                } else {
                    echo 'ID buku tidak tersedia.';
                }
            ?>

            <label for="lama-select">Lama Peminjaman</label>
            <select name="lama" id="lama-select">
                <option value=""></option>
                <option value="1">1 Hari</option>
                <option value="2">2 Hari</option>
                <option value="3">3 Hari</option>
                <option value="4">4 Hari</option>
                <option value="5">5 Hari</option>
                <option value="6">6 Hari</option>
                <option value="7">7 Hari</option>
                <option value="8">8 Hari</option>
                <option value="9">9 Hari</option>
                <option value="10">10 Hari</option>
                <option value="11">11 Hari</option>
                <option value="12">12 Hari</option>
                <option value="13">13 Hari</option>
                <option value="14">14 Hari</option>
                <option value="15">15 Hari</option>
                <option value="16">16 Hari</option>
                <option value="17">17 Hari</option>
                <option value="18">18 Hari</option>
                <option value="19">19 Hari</option>
                <option value="20">20 Hari</option>
                <option value="21">21 Hari</option>
                <option value="22">22 Hari</option>
                <option value="23">23 Hari</option>
                <option value="24">24 Hari</option>
                <option value="25">25 Hari</option>
                <option value="26">26 Hari</option>
                <option value="27">27 Hari</option>
                <option value="28">28 Hari</option>
                <option value="29">29 Hari</option>
                <option value="30">30 Hari</option>
                <option value="31">31 Hari</option>
                
                <!-- Tambahkan pilihan lama peminjaman lainnya sesuai kebutuhan -->
            </select>
            
            <button type="button" onclick="buktiPeminjaman(<?php echo $id; ?>)">Pinjam Sekarang</button>
        </div>
    </main>

    <footer>
        <p>&copy; Kelompok 4 - Pemrograman Web - TIK2032G</p>
    </footer>
    <script src="main.js"></script>

    <script>
        function buktiPeminjaman(idBuku) {
            var lamaPeminjaman = document.getElementById('lama-select').value;
            
            window.location.href = "../strukpeminjaman/index.php?id=" + idBuku + "&lama=" + lamaPeminjaman;
        }
    </script>

</body>
</html>
