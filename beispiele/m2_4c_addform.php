<html lang="de">
<head>
    <title>Addform</title>
</head>
<body>

<form method="get" >

    <input type="text" id="erster" placeholder="erste Zahl eingeben" name="erster" value ="<?php echo $_GET['erster']; ?>">
    <input type="text" id="zweiter" placeholder="zweite Zahl eingeben" name="zweiter" value="<?php echo $_GET[zweiter]; ?>" ><br><br>
    <input type="submit" id="result" name="addieren" value="Addieren"> <input type ="submit" id="result" name="multiplizieren" value ="Multiplizieren"> <br><br><br>

    <?php

    if (isset($_GET['addieren']) ){
        $a=(int)$_GET['erster'];
        $b=(int)$_GET['zweiter'];

        $result = addition($a,$b);

        echo "Das Ergebnis ist:", $result;
    }

    if (isset($_GET['multiplizieren']) ){
        $a=(int)$_GET['erster'];
        $b=(int)$_GET['zweiter'];

        $result = multiplication($a,$b);

        echo "Das Ergebnis ist:", $result;
    }




    function addition ($a, $b=0):int{
        return $a+$b;
    }

    function multiplication ($a, $b=0):int{
        return $a*$b;
    }
    ?>



</form>
</body>
</html>

