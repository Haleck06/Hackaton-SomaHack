<?php
session_start();

if (!isset($_SESSION['mpampiasa']) || $_SESSION['mpampiasa']['role'] !== 'admin') {
    header("Location: fidirana.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="mg">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - ZAHAVA MADA</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
    <h1>👨‍💼 Takelaka Admin</h1>
    <ul>
        <li><a href="utilisateurs.php">Mpampiasa</a></li>
        <li><a href="toerana.php">Toerana</a></li>
        <li><a href="fady.php">Fady</a></li>
        <li><a href="faritra.php">Faritra</a></li>
        <li><a href="fivoarana.php">Fivoarana</a></li>
        <li><a href="../mivoaka.php">Mivoaka</a></li>
    </ul>
</body>
</html>
