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
        $llibre_prestec_estat = isset($_POST["llibre_prestec_estat"]) ? "value='{$_POST["llibre_prestec_estat"]}'" : "";
        $data_inici_prestec = isset($_POST["data_inici_prestec"]) ? "value='{$_POST["data_inici_prestec"]}'" : "";
        $isbn_libre_presctec = isset($_POST["isbn_libre_presctec"]) ? "value='{$_POST["isbn_libre_presctec"]}'" : "";
        if($_POST['metodo'] == "PUT") echo "<input type='hidden' value='{$_POST["titol"]}' name='id_anterior'>";
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
        <label for='llibre_prestec_estat'>Llibre prestat?:</label>
        <input type='text' id='llibre_prestec_estat' name='llibre_prestec_estat' {$llibre_prestec_estat} readonly><br>
        <label for='data_inici_prestec'>Data inici del préstec:</label>
        <input type='text' id='data_inici_prestec' name='data_inici_prestec' {$data_inici_prestec} readonly><br>
        <label for='isbn_libre_presctec'>ISBN del llibre prestat:</label>
        <input type='text' id='isbn_libre_presctec' name='isbn_libre_presctec' {$isbn_libre_presctec} readonly><br>

        <input type='submit' value='Afegir'>";
        
        ?>
        


    </form>
    
</body>
</html>