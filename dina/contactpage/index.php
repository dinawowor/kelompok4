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

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">

  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@1,300&display=swap" rel="stylesheet">
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
    <div class="container">

    <main>
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic"><strong>Address</strong></div>
          <div class="text-one">
            <a href="https://goo.gl/maps/qmGBzPkoRw7cDa8U6">Sekretariat Perkantas Sulawesi Utara</a>
          </div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic"><strong>Phone</strong></div>
          <div class="text-one">
            <a href="https://wa.me/082346717877">+6282346717877</a>
          </div>
        </div>
        <div class="instagram details">
          <i class="fas fa-envelope"></i>
          <div class="topic"><strong>Instagram</strong></div>
          <div class="text-one">
            <a href="https://instagram.com/perkantassulut?igshid=YmMyMTA2M2Y=">@perkantassulut</a>
          </div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Suggestion and Support Box!</div>
        <p>Thank you for visiting our website, If you have suggestions and additions, please fill them in here!</p>
        <form action="#">
          <div class="input-box">
            <input type="text" placeholder="Your name">
          </div>
          <div class="input-box">
            <input type="text" placeholder="Your email">
          </div>
          <div class="input-box message-box">
            <input type="text" placeholder="Your messages">

            <div class="pencet">
              <button type="button" class="pct" onclick="openPopup()">Submit</button>
              <a href="about.html" class="pct">Back To About</a>
              <a href="index.html" class="pct">Back To Home</a>
              <div class="popup" id="popup">
                <img src="404-tick.png">
                <h2>Thank You!</h2>
                <p>Your respond has been successfully submitted.</p>
                <button type="button" class="okpct" onclick="closePopup()">OK</button>
              </div>
            </div>
        </main>
        

        </form>
      </div>
    </div>
    <footer>
        <p>&copy; Kelompok 4 - Pemrograman Web - TIK2032G</p>
      </footer>
    <script src="main.js"></script>
</body>

</html>