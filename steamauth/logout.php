<?php
header('Location: /index.html'); // Change this to where you want logged out users to be redirected to.
session_start();
unset($_SESSION['steamid']);
?>


