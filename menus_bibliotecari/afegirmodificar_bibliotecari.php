<?php
include_once '../clases/usuari.php';
include_once '../clases/bibliotecari.php';

session_start();

if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}
?>


<html>
<head>
    <meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/estils.css'>
	<title>
		FORMULARI
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
    <form action="../info_tots_bibliotecaris.php" method="GET">
        <input type="submit" value="Torna enrere">
    </form>
    </div>';
    echo "</div>";

    ?>



    <form action="afegir_editar_eliminar_usuari.php" method="POST">
        <?php 
        
        
        $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
        $nomcognoms = isset($_POST["nomcognoms"]) ? "value='{$_POST["nomcognoms"]}'" : "";
        $adreca = isset($_POST["adreca"]) ? "value='{$_POST["adreca"]}'" : "";
        $correu = isset($_POST["correu"]) ? "value='{$_POST["correu"]}'" : "";
        $tel = isset($_POST["tel"]) ? "value='{$_POST["tel"]}'" : "";
        $id = isset($_POST["id"]) ? "value='{$_POST["id"]}'" : "";
        $password = isset($_POST["password"]) ? "value='{$_POST["password"]}'" : "";
        $ssocial = isset($_POST["ssocial"]) ? "value='{$_POST["ssocial"]}'" : "";
        /*$primerdia = isset($_POST["primerdia"]) ? "value='{$_POST["primerdia"]}'" : "";*/
        $salari = isset($_POST["salari"]) ? "value='{$_POST["salari"]}'" : "";
        $cap = isset($_POST["cap"]) ? "value='{$_POST["cap"]}'" : "";
        if($_POST['metodo'] == "PUT") echo "<input type='hidden' value='{$_POST["id"]}' name='id_anterior'>";
        echo "
       
        <input type='hidden' value='{$metodo}' name='tipus'>
        

        <label for='nomcognoms'>Nom i cognoms:</label>
        <input type='text' id='nomcognoms' name='nomcognoms' {$nomcognoms} ><br>
        <label for='adreca'>Adreça:</label>
        <input type='text' id='adreca' name='adreca' {$adreca}><br>
        <label for='correu'>Correu:</label>
        <input type='text' id='correu' name='correu' {$correu}><br>
        <label for='tel'>Telèfon?:</label>
        <input type='text' id='tel' name='tel' {$tel}><br>
        <label for='id'>ID:</label>
        <input type='text' id='id' name='id' {$id}><br>
        <label for='password'>Contrasenya:</label>
        <input type='password'  pattern='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'  id='password' name='password' {$password}><br>
        <label for='ssocial'>Seguretat Social:</label>
        <input type='text' id='ssocial' name='ssocial' {$ssocial}><br>
        <label for='salari'>Salari:</label>
        <input type='text' id='salari' name='salari' {$salari}><br>
        <label for='cap'>És cap?:</label>
        <input type='text' id='cap' name='cap' {$cap}><br>

        <input type='submit' value='Desar'>";
        
        ?>
        


    </form>
    
</body>
</html>