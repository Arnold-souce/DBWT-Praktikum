<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['passwort'])
header('location: praktikum.blade.php');
exit;