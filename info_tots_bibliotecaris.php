<?php
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';
include_once './clases/llibre.php';

session_start(); // always call this at top


if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}

$bibliotecaris_csv = "bibliotecaris.csv";
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
?>


<?php 

if($_SESSION['usuari']->nom_de_clase()=="Bibliotecari_cap"){
    echo "<p> <form action='/menus_bibliotecari/afegirmodificar_bibliotecari.php' method='POST'>
            <input type='hidden' name='metodo' value='POST'>
            <input type='submit' value='Afegir bibliotecari' />
            </form>
        </<p>";
}


?>

<table border="2">
    <tr>
        <th>Nom de bibliotecari</th>
        <th>Adreça</th>
        <th>Correu</th>
        <th>Telèfon</th>
        <th>ID</th>
        <th>Contrasenya</th>
        <th>Seguretat Social</th>
        <th>Primer dia</th>
        <th>Salari</th>
        <th>Bibliotecari cap?</th>
    </tr>  
    <?php
        if (($gestor = fopen($bibliotecaris_csv, "r")) !== FALSE) {
            $bibliotecari = array();
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                $bibliotecari = new Bibliotecari ($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5],$datos[6],$datos[7],$datos[8],$datos[9]);
                echo $bibliotecari->mostrar_info($_SESSION['usuari']->nom_de_clase());
            }
            fclose($gestor);
        }
        
    ?>
</table>
</body>