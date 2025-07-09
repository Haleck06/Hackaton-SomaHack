<?php
session_start();
session_destroy();
header("Location: fidirana.php");
exit();
