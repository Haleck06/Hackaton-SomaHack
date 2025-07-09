<?php
require_once 'includes/mpampiasa.class.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $anarana = $_POST['anarana'] ?? '';
    $email = $_POST['email'] ?? '';
    $tenimiafina = $_POST['tenimiafina'] ?? '';

    if (!empty($anarana) && !empty($email) && !empty($tenimiafina)) {
        $mp = new Mpampiasa();
        $vita = $mp->misoratra($anarana, $email, $tenimiafina);

        if ($vita) {
            $message = "✅ Vita ny fisoratana anarana. Azafady midira.";
            header("Refresh: 2; URL=fidirana.php");
        } else {
            $message = "⚠️ Diso: efa misy io email io.";
        }
    } else {
        $message = "⚠️ Fenoy daholo ny saha rehetra.";
    }
}
?>

<!DOCTYPE html>
<html lang="mg">
<head>
    <meta charset="UTF-8">
    <title>Fisoratana anarana - ZAHAVA MADA</title>
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
        <h2>Mamoròna kaonty</h2>
        <?php if ($message): ?>
            <p class="msg"><?= $message ?></p>
        <?php endif; ?>
        <form method="POST">
            <input type="text" name="anarana" placeholder="Anarana feno" required>
            <input type="email" name="email" placeholder="Adiresy mailaka" required>
            <input type="password" name="tenimiafina" placeholder="Tenimiafina" required>
            <button type="submit">Misoratra</button>
        </form>
        <p>Efa manana kaonty ? <a href="fidirana.php">Midira</a></p>
    </div>
</div>
</body>
</html>
