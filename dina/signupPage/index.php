<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nomor = $_POST['nomor'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        if (empty($nama) || empty($pass)) {
            echo "Nama dan password tidak boleh kosong";
        } else {
            $conn = new mysqli("localhost", "root", "", "tugas_php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tabel_users WHERE nama = '$nama'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "Email atau nama pengguna sudah ada.";
            } else {
                $sql = "INSERT INTO tabel_users (nama, nomor_telepon, email, password) VALUES ('$nama', '$nomor', '$email', '$pass')";
                if ($conn->query($sql) === TRUE) {
                    header('Location: index.html');
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            $conn->close();
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Library Perkantas Sulut</title>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&family=Urbanist:ital,wght@1,300&family=Zen+Dots&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <main id="container">
            <div>
                <form action="#" id="form-pinjam" method="POST">
                    <p>
                        <label>Nama:</label>
                        <input type="text" name="nama" id="nama" placeholder="Enter Your Name" required />
                    </p>
                    <p>
                        <label>Nomor:</label>
                        <input type="tel" name="nomor" id="nomor" placeholder="Enter Your Number" required />
                    </p>
                    <p>
                        <label for="email">Email:</label> 
                        <input type="text" placeholder="Enter Your E-mail" name="email" id="email" required><br>
                    <p>
                    <p>
                        <label for="password">Password:</label> 
                        <input type="password" placeholder="Enter Your Password" name="pass" id="pass" required><br>
                    <p>
                    <p>
                        <label for="re-password">Repeat Password:</label> 
                        <input type="password" placeholder="Re-enter Your Password" name="re-pass" id="re-pass" required><br>
                    <p>
                    <input id="myButton" type="submit" name="submit" onclick="myFunction()" value="Submit">
                    <a href="../index.php" class="log-in">Log in</a>
                    </p>
                </form>
            </div>	
    </body>
</html>