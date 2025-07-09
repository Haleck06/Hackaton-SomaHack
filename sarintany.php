<?php
require_once 'includes/fanamarinana.php';
?>

<!DOCTYPE html>
<html lang="mg">
<head>
  <meta charset="UTF-8">
  <title>Sarintany - ZAHAVA MADA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/stylesarintany.css">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f9f9f9;
    }

    h2 {
      text-align: center;
      color: #0ca750;
      margin-top: 20px;
    }

    .search-box {
      text-align: center;
      margin-top: 10px;
    }

    #searchInput {
      width: 300px;
      padding: 10px;
      border: 2px solid #0ca750;
      border-radius: 10px;
      font-size: 14px;
    }

    .map-wrapper {
      width: 90%;
      height: 80vh;
      margin: 20px auto;
      border: 2px solid #0ca750;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background-color: white;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 12px 0;
      border-top: 1px solid #ccc;
      box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .nav a {
      text-decoration: none;
      color: #d32f2f;
      font-weight: bold;
      font-size: 14px;
      transition: color 0.3s ease, transform 0.2s ease;
    }

    .nav a:hover {
      color: #0ca750;
      transform: scale(1.1);
    }

    .message {
      text-align: center;
      margin-top: 10px;
      color: #d32f2f;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <h2>🗺️ Sarintany - Tadiavo ny toerana tianao</h2>

  <div class="search-box">
    <input type="text" id="searchInput" placeholder="Tadiavo: Nosy Be, Antsirabe, Isalo...">
    <p id="message" class="message"></p>
  </div>

  <div class="map-wrapper">
    <iframe id="mapFrame"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13679828.687319418!2d36.196957980996125!3d-18.522643963591914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21d1a4e3ea238545%3A0x5244e3c1977b1388!2sMadagascar!5e1!3m2!1sfr!2smg!4v1751986819497!5m2!1sfr!2smg" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <footer class="nav">
    <a href="fandraisana.php">🏠 Fandraisana</a>
    <a href="sarintany.php">🗺️ Sarintany</a>
    <a href="mpanampy.html">🤖 Mpanampy</a>
    <a href="mombamomba.php">👤 Mombamomba</a>
  </footer>

  <script>
    const searchInput = document.getElementById("searchInput");
    const mapFrame = document.getElementById("mapFrame");
    const message = document.getElementById("message");

    const destinations = {
      "nosy be": "https://www.google.com/maps?q=Nosy+Be+Madagascar&output=embed",
      "antsirabe": "https://www.google.com/maps?q=Antsirabe+Madagascar&output=embed",
      "isalo": "https://www.google.com/maps?q=Isalo+National+Park+Madagascar&output=embed",
      "antananarivo": "https://www.google.com/maps?q=Antananarivo+Madagascar&output=embed",
      "morondava": "https://www.google.com/maps?q=Morondava+Madagascar&output=embed",
      "toliara": "https://www.google.com/maps?q=Toliara+Madagascar&output=embed",
      "mahajanga": "https://www.google.com/maps?q=Mahajanga+Madagascar&output=embed",
      "fianarantsoa": "https://www.google.com/maps?q=Fianarantsoa+Madagascar&output=embed",
      "sainte marie": "https://www.google.com/maps?q=Sainte+Marie+Madagascar&output=embed",
      "fort dauphin": "https://www.google.com/maps?q=Fort+Dauphin+Madagascar&output=embed",
      "ranomafana": "https://www.google.com/maps?q=Ranomafana+National+Park+Madagascar&output=embed",
      "andohalo": "https://www.google.com/maps?q=Andohalo+Antananarivo&output=embed",
      "anakao": "https://www.google.com/maps?q=Anakao+Madagascar&output=embed",
      "ifaty": "https://www.google.com/maps?q=Ifaty+Madagascar&output=embed",
      "ambatolampy": "https://www.google.com/maps?q=Ambatolampy+Madagascar&output=embed",
      "ambositra": "https://www.google.com/maps?q=Ambositra+Madagascar&output=embed",
      "antsiranana": "https://www.google.com/maps?q=Antsiranana+Madagascar&output=embed",
      "diego": "https://www.google.com/maps?q=Diego+Suarez+Madagascar&output=embed",
      "masoala": "https://www.google.com/maps?q=Masoala+National+Park+Madagascar&output=embed"

    };

    searchInput.addEventListener("keyup", function (e) {
      const val = e.target.value.toLowerCase().trim();
      if (destinations[val]) {
        mapFrame.src = destinations[val];
        message.textContent = "";
      } else if (val.length > 2) {
        message.textContent = "⛔ Toerana tsy hita. Andramo indray.";
      } else {
        message.textContent = "";
      }
    });
  </script>

</body>
</html>
