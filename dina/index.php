<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $pass = $_POST['pass'];

        if (empty($nama) || empty($pass)) {
            echo "Please fill in all the fields.";
        } else {
            $conn = new mysqli("localhost", "root", "", "tugas_php");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("SELECT * FROM tabel_users WHERE nama = ? AND password = ?");
            $stmt->bind_param("ss", $nama, $pass);

            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                session_start();
                $_SESSION['nama'] = $nama;
                header("Location: homePage/index.php");
                exit;
            } else {
                echo "Invalid username or password.";
            }

            $stmt->close();
            $conn->close();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nomor 4</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
        .login-box form .sign-up a {
            color: black;
            text-decoration: none;
        }
    </style>
    <body>
        <div class="login-box">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="user-box">
                    <input type="text" name="nama" id="username" required="">
                    <label>Nama</label>
                </div>
                <div class="user-box">
                    <input type="password" name="pass" id="pass" required="">
                    <label>Password</label>
                </div>
                <div class="sign-up">
                    <a href="signupPage/index.php">Sign Up Akun</a>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
