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
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Library Perkantas Sulut</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&family=Urbanist:ital,wght@1,300&family=Zen+Dots&display=swap" rel="stylesheet">
    </head>

    <body>
        <header>
            <h1>E-Library Perkantas Sulut</h1>
            <p>A Good Book Is A Good Friend</p>
            <form action="../logout.php" method="post">
                <div class="log-out">
                    <button type="submit">Logout</button>
                </div>
            </form>
        </header>
        <navbar>
            <ul>
                <li><a href="../homePage/index.php">Home</a></li>
                <li><a href="../aboutpage/index.php">About Us</a></li>
                <li><a href="../contactpage/index.php">Contact</a></li>
                <li><a href="../uploadPage/index.php">Upload</a></li>
            </ul>
        </navbar><br><br>

        <main>
            <section>
                <?php 
                    $conn = new mysqli("localhost", "root", "", "tugas_php");

                    if ($conn->connect_error) {
                        die("Terjadi kegagalan: " . $conn->connect_error);
                    }

                    $query = "SELECT * FROM tabel_buku";
                    $hasil = $conn->query($query);

                    if ($hasil->num_rows > 0) {
                        while ($row = $hasil->fetch_assoc()) {
                            $judul = $row["judul"];
                            $deskripsi = $row["deskripsi"];
                            $sampul = $row["sampul"];
                            $id = $row["id"];

                            echo '<div>';
                            echo '<img src="../uploadPage/' . $sampul . '" alt="' . $judul . '">';
                            echo '<h2>' . $judul . '</h2>';
                            echo '<p>' . $deskripsi . '</p>';
                            // echo '<button class="btn-pinjam" id="btn-pinjam-' . $id . '" onclick="infoBuku()"' . $id . '">PINJAM</button>';
                            echo '<a class="btn-pinjam" href="../info-buku/index.php?id=' . $id . '">PINJAM</a>';
                            echo '</div>';
                        }
                    }
                ?>
            </section>
        </main>
        <footer>
            <p>&copy; Kelompok 4 - Pemrograman Web - TIK2032G</p>
        </footer>
        <script src="main.js"></script>
</html>
