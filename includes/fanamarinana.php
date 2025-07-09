<?php
session_start();

// Raha tsy efa tafiditra ilay mpampiasa dia alefa any amin'ny fidirana
if (!isset($_SESSION['mpampiasa'])) {
    header("Location: fidirana.php");
    exit();
}
?>
