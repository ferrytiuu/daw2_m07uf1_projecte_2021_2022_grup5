
<?php
session_name($_POST["nombre"]);
session_start();
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
            <input type="hidden" name="nombre" value="'.session_name().'">
            <input type="submit" value="Tanca la sessió">
        </form>
    
        </div>';

    switch ($_SESSION["usuari"]->nom_de_clase()) {
        case 'Usuari':
            readfile("usuario.html");
            break;

        case 'Bibliotecari':
            readfile("bibliotecario.html");
            break;

        default:
        
            break;
    }
    ?>
</body>