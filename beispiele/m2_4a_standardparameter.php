<html lang="de">
<head>
    <title>Standardparameter</title>
</head>
<body>

<form method="get" >

    <input type="text" id="erster" name="erster" value ="<?php echo $_GET['erster']; ?>"> + <input type="text" id="zweiter" name="zweiter" value="<?php echo $_GET[zweiter]; ?>" >
    <input type="submit" id="result" value="Rechnen"><br>

<?php
if (isset($_GET['erster']) && isset($_GET['zweiter'])){
    $a=(int)$_GET['erster'];
    $b=(int)$_GET['zweiter'];

    $result = addition($a,$b);

    echo "Das Ergebnis ist:", $result;
}

function addition ($a, $b=0):int{
    return $a+$b;
}

?>



</form>
</body>
</html>

