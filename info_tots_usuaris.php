<?php
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';
include_once './clases/llibre.php';

session_start(); // always call this at top


if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}

$usuaris_csv = "usuaris.csv";
//echo session_id();
//print_r ($_SESSION);


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
?>

<form action="../inici.php" method="POST">
    <input type="submit" value="Torna enrere">
</form>

<?php 

if($_SESSION['usuari']->nom_de_clase()=="Bibliotecari"){
    echo "<p> <form action='/menus_bibliotecari/afegirmodificar_usuari.php' method='POST'>
            <input type='hidden' name='metodo' value='POST'>
            <input type='submit' value='Afegir usuari' />
            </form>
        </<p>";
}


?>

<table border="2">
    <tr>
        <th>Nom d'usuari</th>
        <th>Adreça</th>
        <th>Correu</th>
        <th>Telèfon</th>
        <th>ID</th>
        <th>Contrasenya</th>
        <th>Estat del llibre en prestec</th>
        <th>Data inici del prestec</th>
        <th>ISBN del llibre en prestec</th>
    </tr>  
    <?php
        if (($gestor = fopen($usuaris_csv, "r")) !== FALSE) {
            $usuaris = array();
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                $usuari = new Usuari ($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                echo $usuari->mostrar_info($_SESSION['usuari']->nom_de_clase());
            }
            fclose($gestor);
        }
        
    ?>
</table>
</body>
