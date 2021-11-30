<?php
/*
include("./clases/usuari.php");
include("./clases/bibliotecari.php");
*/
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';


$usuari = "usuaris.csv";
$bibliotecari = "bibliotecaris.csv";
$tipus_usuari = $POST["tipus_usuari"];

var_dump($tipus_usuari);

if (empty($_POST["usuari"]) || empty($_POST["password"])) {
    exit();
}


if (($gestor = fopen("$usuari", "r")) !== FALSE ) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        if ($datos[4] == $_POST["usuari"]  && $datos[5] == $_POST["password"]) {
            $id = (string)$_POST["usuari"];
            session_name($id);
            session_start();
            //$_SESSION["tipus"] = "usuari";
            $_SESSION["usuari"] = new Usuari($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8]);
            break;
        }
    }
    fclose($gestor);
}

if (($gestor = fopen("$bibliotecari", "r")) !== FALSE ) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        if ($datos[4] == $_POST["usuari"]  && $datos[5] == $_POST["password"]) {
            $id = (string)$_POST["usuari"];
            session_name($id);
            session_start();
            //$_SESSION["tipus"] = "bibliotecari";
            $_SESSION["usuari"] = new Bibliotecari($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9]);
            break;
        }
    }
    fclose($gestor);
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
    echo "Sessió de l'usuari: " . session_name() . "<br>";
    echo  $_SESSION["usuari"]->get_name() . "<br>";
    echo "</div>";
    echo '<div id="boto_esborrar">
        <form action="./logout.php" method="POST">
            <input type="hidden" name="nombre" value="' . session_name() . '">
            <input type="submit" value="Tanca la sessió">
        </form>
    
        </div>';

    switch ($_SESSION["usuari"]->nom_de_clase()) {
        case 'Usuari':
            readfile("menus_usuari/usuario.html");
            var_dump($_COOKIE);
            break;

        case 'Bibliotecari':
            readfile("menus_bibliotecari/bibliotecari.html");
            break;

        default:

            break;
    }
    ?>
</body>