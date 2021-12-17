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

if($_SESSION['usuari']->nom_de_clase()=="Bibliotecari" || $_SESSION['usuari']->nom_de_clase()=="Bibliotecari_cap") {
    echo "<p> <form action='/menus_bibliotecari/afegirmodificar_llibre.php' method='POST'>
            <input type='hidden' name='metodo' value='POST'>
            <input type='submit' value='Afegir llibre' />
            </form>
        </<p>";
}




echo "<table border='2'>";
    $taula="<tr>
        <th>Titol</th>
        <th>Autor</th>
        <th>ISBN</th>
        <th>Prestec</th>
        <th>Data de prestec</th>
        <th>Id de l'usuari</th>
    </tr>";
        if (($gestor = fopen($llibres, "r")) !== FALSE) {
            $llibres = array();
            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                $llibre = new Llibre ($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
                $taula.= $llibre->mostrar_info($_SESSION['usuari']->nom_de_clase());
                $taula_comprimida=base64_encode(gzcompress($taula,9));
                
            }
            fclose($gestor);
            echo $taula;
        }
        
    ?>
</table>
<?php
echo "<form action='../dompdf.php' method='POST'>
    <input type='hidden' name='tipus' value='info_tots_llibres'>
    <input type='hidden' name='codi' value='{$taula_comprimida}'>
    <input type='submit' value='Imprimeix a PDF'>
</form>";
?>
</body>
