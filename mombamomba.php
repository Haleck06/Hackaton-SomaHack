<?php
session_start();
if (!isset($_SESSION['mpampiasa'])) {
    header("Location: fidirana.php");
    exit();
}
$mpampiasa = $_SESSION['mpampiasa'];
?>
<!DOCTYPE html>
<html lang="mg">
<head>
  <meta charset="UTF-8">
  <title>Mombamomba - ZAHAVA MADA</title>
  <link rel="stylesheet" href="public/style.css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      background: #f9f9f9;
    }
    header {
      background-color: #00843D;
      color: white;
      padding: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h2 {
      margin: 0;
    }
    .logout-btn {
      background: #d80000;
      color: white;
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .profile-card {
      background: white;
      margin: 20px;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
      text-align: center;
    }
    .profile-card img {
      width: 70px;
      height: 70px;
      border-radius: 50%;
      background: #ccc;
    }
    .profile-info {
      margin-top: 10px;
    }
    .stats {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }
    .stat {
      background: #f1f1f1;
      padding: 10px;
      border-radius: 10px;
      width: 30%;
    }
    .stat h3 {
      margin: 0;
      font-size: 24px;
      color: #00843D;
    }
    .stat p {
      margin: 5px 0 0;
      font-size: 14px;
    }
    .section {
      margin: 20px;
      background: #fff;
      border-radius: 10px;
      padding: 15px;
      box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }
    .section h4 {
      margin-bottom: 10px;
      color: #d80000;
    }
    .section-item {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
    }

    footer {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: white;
      border-top: 2px solid #ccc;
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 10px 0;
      z-index: 1000;
    }
    footer a {
      color: #00843D;
      text-decoration: none;
      font-size: 14px;
      text-align: center;
    }
    footer a:hover {
      color: #d80000;
    }
  </style>
</head>
<body>

  <header>
    <h2>Mombamomba</h2>
    <form action="mivoaka.php" method="POST">
      <button type="submit" class="logout-btn">Mivoaka</button>
    </form>
  </header>

  <div class="profile-card">
    <img src="public/img/user.png" alt="Mpampiasa">
    <div class="profile-info">
      <h3><?= htmlspecialchars($mpampiasa['anarana'] ?? 'Mpampiasa') ?></h3>
      <p><?= htmlspecialchars($mpampiasa['email'] ?? '') ?></p>
      <p><small></small></p>
    </div>

    <div class="stats">
      <div class="stat">
        <h3>12</h3>
        <p>Toerana tiako</p>
      </div>
      <div class="stat">
        <h3>8</h3>
        <p>Hevitra</p>
      </div>
      <div class="stat">
        <h3>45</h3>
        <p>Sary</p>
      </div>
    </div>
  </div>

  <div class="section">
    <h4>Fandrindrana</h4>
    <div class="section-item">
      <span>🔔 Filazana</span>
      <input type="checkbox" checked>
    </div>
    <div class="section-item">
      <span>📍 Toerana</span>
      <input type="checkbox">
    </div>
  </div>

  <div class="section">
    <h4>Hafa</h4>
    <div class="section-item">❤️ Toerana tiako - 12 toerana</div>
    <div class="section-item">⭐ Ny hevitra - 8 hevitra</div>
    <div class="section-item">📷 Ny sariko - 45 sary</div>
  </div>

  <footer>
    <a href="fandraisana.php">🏠 Fandraisana</a>
    <a href="sarintany.php">🗺️ Sarintany</a>
    <a href="mpanampy.html">🤖 Mpanampy</a>
    <a href="mombamomba.php" style="color: #d80000;">👤 Mombamomba</a>
  </footer>

</body>
</html>
