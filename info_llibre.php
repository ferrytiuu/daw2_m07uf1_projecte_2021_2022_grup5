<?php
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';
include_once './clases/llibre.php';

session_start(); // always call this at top


if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}

$llibres = "llibres.csv";
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
    echo "<p> <form action='/menus_bibliotecari/afegirmodificar_llibre.php' method='POST'>
            <input type='hidden' name='metodo' value='POST'>
            <input type='submit' value='Afegir llibre' />
            </form>
        </<p>";
}


?>

<table border="2">
    <tr>
        <th>Titol</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Prestec</th>
        <th>Data de prestec</th>
        <th>Id de l'usuari</th>
    </tr>  
    <?php
        if (($gestor = fopen($llibres, "r")) !== FALSE) {
            $llibres = array();
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                $llibre = new Llibre ($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
                echo $llibre->mostrar_info($_SESSION['usuari']->nom_de_clase());
            }
            fclose($gestor);
        }
        
    ?>
</table>
</body>
