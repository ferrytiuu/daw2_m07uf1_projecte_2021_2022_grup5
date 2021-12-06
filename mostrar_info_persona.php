
<?php

include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';

session_start();

if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}
?>

<html>

<head>
    <link rel='stylesheet' type='text/css' media='screen' href='css/estils.css'>
    <title>
        Inici
    </title>
</head>
<body>
<?php
    echo "<div id='sessio'>";
    echo "Identificador de sessió: " . session_id() . "<br>";
    echo "Sessió de l'usuari: " . $_SESSION['usuari']->get_id() . "<br>";
    echo  $_SESSION['usuari']->get_name() . "<br>";
    echo "</div>";
    echo '<div id="boto_esborrar">
        <form action="./logout.php" method="POST">
            <input type="hidden" name="nombre">
            <input type="submit" value="Tanca la sessió">
        </form>
        </div>';

    switch ($_SESSION["usuari"]->nom_de_clase()) {
        case 'Usuari':
            readfile("usuari.html");
            break;

        case 'Bibliotecari':
            readfile("bibliotecari.html");
            break;

        default:
        
            break;
    }
    ?>
</body>