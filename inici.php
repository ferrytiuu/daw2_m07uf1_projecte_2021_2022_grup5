<?php
$usuari = "usuaris.csv";
$bibliotecari = "bibliotecaris.csv";

if (empty($_POST["usuari"]) || empty($_POST["password"])) {
    exit();
}

if (($gestor = fopen("$usuari", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        if ($datos[0] == $_POST["usuari"]  && $datos[1] == $_POST["password"]) {
            session_name($_POST["usuari"]);
            session_start();
            $_SESSION["tipus"] = "usuari";
            break;
        }
    }
    fclose($gestor);
}
if (($gestor = fopen("$bibliotecari", "r")) !== FALSE) {
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        if ($datos[0] == $_POST["usuari"]  && $datos[1] == $_POST["password"]) {
            session_name($_POST["usuari"]);
            session_start();
            $_SESSION["tipus"] = "bibliotecari";
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

<body>
    <?php
    echo "<div id='sessio'>";
    echo "Identificador de sessió: " . session_id() . "<br>";
    echo "Sessió de l'usuari: " . session_name() . "<br>";
    echo "</div>";

    switch ($_SESSION["tipus"]) {
        case 'usuari':
            readfile("exemple1.html");
            break;

        case 'bibliotecari':
            readfile("exemple2.html");
            break;

        default:
        
            break;
    }
    ?>
</body>
</head>