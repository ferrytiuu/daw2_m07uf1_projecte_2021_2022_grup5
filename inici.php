<?php
/*
include("./clases/usuari.php");
include("./clases/bibliotecari.php");
*/
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';


$usuari = "usuaris.csv";
$bibliotecari = "bibliotecaris.csv";
$tipus_usuari = $_REQUEST["tipus_usuari"];
//echo "ha muerto";
//var_dump($POST);
/*
if(isset($_REQUEST['submit'])){
    $test = $_REQUEST['usuari'];
    echo (string)$_REQUEST['usuari'];
    echo $_REQUEST['password'];
  }

if (!empty($_REQUEST['usuari']) || !empty($_REQUEST['password'])) {
    exit();
}*/
//print_r ($_SESSION);



if (isset($_REQUEST["usuari"]) && isset($_REQUEST['password'])) {

    if (($gestor = fopen("$usuari", "r")) !== FALSE && $tipus_usuari == "tipus_estandard") {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            if ($datos[4] == $_REQUEST['usuari']  && $datos[5] == $_REQUEST['password']) {
                $id = (string)$_REQUEST['usuari'];
                //session_name("usuario");

                session_start();
                //$_SESSION["tipus"] = "usuari";

                $_SESSION['usuari'] = new Usuari($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8]);
                break;
            }
        }
        fclose($gestor);
    }

    if (($gestor = fopen("$bibliotecari", "r")) !== FALSE && $tipus_usuari == "tipus_bibliotecari") {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            if ($datos[4] == $_REQUEST['usuari']  && $datos[5] == $_REQUEST['password'] ) {
                $id = (string)$_REQUEST['usuari'];
                //session_name("usuario");
                session_start();
                //Print_r ($_SESSION);
                //$_SESSION["tipus"] = "bibliotecari";
                $_SESSION["usuari"] = new Bibliotecari($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8], $datos[9]);
                break;
            }
        }
        fclose($gestor);
    }
    filter_var_array($_POST, FILTER_SANITIZE_STRING);
} else {
    session_start(); // always call this at top

    if (!isset($_SESSION["usuari"])) {
        header('location:index.html');
        exit;
    }
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
    if(isset($_SESSION['usuari']) ){

    
        echo "<div id='sessio'>";
        echo "<b>Identificador de sessió:</b> " . session_id() . "<br>";
        echo "<b>Sessió de l'usuari:</b> " . $_SESSION['usuari']->get_id() . "<br>";
        echo "<b>Nom d'usuari:</b> ". $_SESSION['usuari']->get_name() . "<br>";
        echo '<div id="icones_sessio">
        <form action="./logout.php" method="POST">
            <input type="submit" value="Tanca la sessió">
        </form>
        </div>';
        echo "</div>";

        switch ($_SESSION['usuari']->nom_de_clase()) {
            case 'Usuari':
                readfile("menus_usuari/usuari.html");
                exit();
                break;

            case 'Bibliotecari':
                readfile("menus_bibliotecari/bibliotecari.html");
                break;

            case 'Bibliotecari_cap':
                readfile("menus_bibliotecari/bibliotecari_cap.html");
                break;

            default:
                break;
        }
    }
    else{
        echo "Usuari no trobat. Verifica que les credencials i el tipus d'usuari són correctes. <br>";
        echo '<a href="index.html">
                <button>Inici</button>
            </a>';
    }
    
    ?>
</body>