<html>
<head>
    <meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/estils.css'>
	<title>
		FORMULARI
	</title>
</head>

<body>
    <form action="afegir_editar_eliminar_usuari.php" method="POST">
        <?php 

        $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
        $nomcognoms = isset($_POST["nomcognoms"]) ? "value='{$_POST["nomcognoms"]}'" : "";
        $adreca = isset($_POST["adreca"]) ? "value='{$_POST["adreca"]}'" : "";
        $correu = isset($_POST["correu"]) ? "value='{$_POST["correu"]}'" : "";
        $tel = isset($_POST["tel"]) ? "value='{$_POST["tel"]}'" : "";
        $id = isset($_POST["id"]) ? "value='{$_POST["id"]}'" : "";
        $password = isset($_POST["password"]) ? "value='{$_POST["password"]}'" : "";
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
        <input type='tel' id='tel' name='tel' {$tel}><br>
        <label for='id'>ID:</label>
        <input type='text' id='id' name='id' {$id}><br>
        <label for='password'>Contrasenya:</label>
        <input type='password' id='password' name='password' {$password}><br>

        <input type='submit' value='Desar'>";
        
        ?>
        


    </form>
    
</body>
</html>