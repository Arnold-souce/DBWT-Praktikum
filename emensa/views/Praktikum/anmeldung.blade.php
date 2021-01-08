@extends('praktikum.layout.praktikumly')
@section('title', 'E-Mensa')
@section('content')
<?php
session_start();
$eingabefalsch = false;
if(isset($_POST['email']))
    if ($_POST['email'] == 'admin@emensa.example' && $_POST['passwort'] = 'tamo1234'){
        $_SESSION['email'] = 'elysee.tchi@yahoo.fr';

        header('location:/praktikum');
        exit;
    }else{
        $eingabefalsch = true;
    }
?>
        <!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title> Login </title>
</head>
<body>

<?php if ($eingabefalsch): ?>
<p> Die Daten sind nicht korrekt.</p>
<?php endif; ?>

<form action="" method="post">

    <label for="email"> email</label>
    <input id="email" name="email" type="text"/> <br>
    <label for="passwort"> passwort </label>
    <input id="passwort" name="passwort" type="text"/> <br>
    <input type="submit">
</form>
</body>
</html>
@endsection