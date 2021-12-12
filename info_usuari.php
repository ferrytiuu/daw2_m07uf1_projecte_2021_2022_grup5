<?php
include_once './clases/usuari.php';
include_once './clases/bibliotecari.php';

session_start(); // always call this at top


if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}
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


<table border="2">

<?php
    switch ($_SESSION['usuari']->nom_de_clase()) {
        case 'Usuari':
            echo "<tr>
            <th>Nom i cognoms</th>
            <th>Adreça</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>ID</th>
            <th>Contrasenya</th>
            <th>Estat del llibre prestat</th>
            <th>Data inici del préstec</th>
            <th>ISBN del llibre prestat</th>";
            echo $_SESSION['usuari']->mostrar_info($_SESSION['usuari']->nom_de_clase());
            break;

        case 'Bibliotecari':
            echo "<tr>
            <th>Nom i cognoms</th>
            <th>Adreça</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>ID</th>
            <th>Contrasenya</th>
            <th>Seguretat Social</th>
            <th>Primer dia</th>
            <th>Salari</th>
            <th>Bibliotecari cap?</th>";
            echo $_SESSION['usuari']->mostrar_info($_SESSION['usuari']->nom_de_clase());
            break;

        case 'Bibliotecari_cap':
            echo "<tr>
            <th>Nom i cognoms</th>
            <th>Adreça</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>ID</th>
            <th>Contrasenya</th>
            <th>Seguretat Social</th>
            <th>Primer dia</th>
            <th>Salari</th>
            <th>Bibliotecari cap?</th>";
            echo $_SESSION['usuari']->mostrar_info($_SESSION['usuari']->nom_de_clase());
            break;

        default:

            break;
    }
    ?>
</table>
</body>