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
    <script src="main.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@600&family=Urbanist:ital,wght@1,300&family=Zen+Dots&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
</head>

<body>
    <header>
        <h1>E-Library Perkantas Sulut</h1>
        <p>Melayani Peminjaman Literatur Rohani</p>
    </header>
    <nav>
        <a href="../homePage/index.php">Home</a>
        <a href="../aboutpage/index.php">About Us</a>
        <a href="../contactpage/index.php">Contact</a>
        <a href="../uploadPage/index.php">Upload</a>
    </nav>

    <main>
        <div class="slider">
            <div class="slider-items">
                <img class="slider-item" src="image/naftali.jpeg" alt="..." />
                <img class="slider-item" src="image/dina.jpeg" alt="..." />
                <img class="slider-item" src="image/kenny.jpeg" alt="..." />
                <img class="slider-item" src="image/elia.jpeg" alt="..." />
            </div>
    
            <div class="slider-controls">
                <span class="bx bxs-chevron-left prev" onclick="changeSlide(-1)"></span>
                <span class="bx bxs-chevron-right next" onclick="changeSlide(1)"></span>
            </div>
    
            <div class="slider-indicators">
                <span onclick="moveTo(1)"></span>
                <span onclick="moveTo(2)"></span>
                <span onclick="moveTo(3)"></span>
                <span onclick="moveTo(4)"></span>
            </div>
    
            <div class="slider-content">
                <div class="info"></div>
                <h3>Naftali F. Sumendap
                    220211060175
                </h3>
                <h3>Dina A.B Wowor
                    210211060022
                </h3>
                <h3>Kenny A. Tulung
                    210211060098
                </h3>
                <h3>Elia K. Mawikere
                    210211060091
                </h3>
            </div>
        </div>
        <br>
        <center><h3><a href="https://youtu.be/yKR2AI-FInw">Link Demo https://youtu.be/yKR2AI-FInw</a></h3></center>
    </main>

    <footer>
        <p>&copy; Kelompok 4 - Pemrograman Web - TIK2032G</p>
    </footer>

    <script src="main.js"></script>
</body>

</html>