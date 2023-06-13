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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $sampul = $_FILES['sampul']['tmp_name'];
        $sampulName = $_FILES['sampul']['name'];

        $sampulExtension = pathinfo($sampulName, PATHINFO_EXTENSION);

        $sampulPath = 'sampul/' . uniqid() . '.' . $sampulExtension;

        move_uploaded_file($sampul, $sampulPath);

        $conn = new mysqli("localhost", "root", "", "tugas_php");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO tabel_buku (judul, deskripsi, sampul) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $judul, $deskripsi, $sampulPath);
        
        if ($stmt->execute()) {
            echo<<<HTML
                <script>
                    alert("Data buku telah berhasil disimpan");
                </script>
            HTML;
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <script src="main.js"></script>
        <title>Upload Buku Baru</title>
    </head>
    <body>
        <div class="container">
            <h1>Upload Buku Baru</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="judul">Judul</label>
                <input type="text" name="judul"><br><br>

                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="" cols="30" rows="3"></textarea><br><br>

                <label for="sampul">Sampul</label><br>
                <input type="file" name="sampul" id=""><br>

                <input type="submit" value="Upload">
            </form>
        </div>
    </body>
</html>
