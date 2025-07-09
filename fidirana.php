<?php
session_start();
require_once 'includes/mpampiasa.class.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $tenimiafina = $_POST['tenimiafina'] ?? '';

    if (!empty($email) && !empty($tenimiafina)) {
        $mp = new Mpampiasa();
        $mpampiasa = $mp->miditra($email, $tenimiafina);
        if ($mpampiasa) {
            $_SESSION['mpampiasa'] = $mpampiasa;
            header("Location: fandraisana.php");
            exit();
        } else {
            $message = "❌ Diso ny email na tenimiafina.";
        }
    } else {
        $message = "⚠️ Fenoy tsara ny saha rehetra.";
    }
}
?>

<!DOCTYPE html>
<html lang="mg">
<head>
    <meta charset="UTF-8">
    <title>Fidirana - ZAHAVA MADA</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<div class="form-container">
    <div class="form-left">
        <div class="logo-container">
            <img src="public/img/logo.jpg" alt="Zahava Mada" class="logo-full">
        </div>
    </div>

    <div class="form-right">
        <h2>Fidirana ao amin'ny kaonty</h2>
        <?php if ($message): ?>
            <p class="msg"><?= $message ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Adiresy mailaka" required>
            <input type="password" name="tenimiafina" placeholder="Tenimiafina" required>
            <button type="submit">Midira</button>
        </form>
        <p>Tsy mbola manana kaonty ? <a href="fisoratana.php">Mamoròna eto</a></p>
    </div>
</div>
</body>
</html>
