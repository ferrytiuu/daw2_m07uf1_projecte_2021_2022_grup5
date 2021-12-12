
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
    echo "<b>Identificador de sessió:</b> " . session_id() . "<br>";
    echo "<b>Sessió de l'usuari:</b> " . $_SESSION['usuari']->get_id() . "<br>";
    echo "<b>Nom d'usuari:</b> ". $_SESSION['usuari']->get_name() . "<br>";
    echo '<div id="icones_sessio">
    <form action="./logout.php" method="POST">
        <input type="submit" value="Tanca la sessió">
    </form>
    <form action="../inici.php" method="GET">
        <input type="submit" value="Torna enrere">
    </form>
    </div>';
    echo "</div>";

    switch ($_SESSION["usuari"]->nom_de_clase()) {
        case 'Usuari':
            readfile("usuari.html");
            break;

        case 'Bibliotecari':
            readfile("bibliotecari.html");
            break;
        
        case 'Bibliotecari_cap':
            readfile("bibliotecari_cap.html");
            break;

        default:
        
            break;
    }
    ?>
</body>