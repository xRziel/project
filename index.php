<?php

if (empty($_SESSION['username'])) {
    header("Location: /036/project/login.php");
    exit();
}
?>