<html>
<head>
    <meta charset="UTF-8">
	<link rel='stylesheet' type='text/css' media='screen' href='../css/estils.css'>
	<title>
		FORMULARI
	</title>
</head>

<body>
    <form action="afegir_editar_eliminar_llibre.php" method="POST">
        <?php 

        $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
        $titol = isset($_POST["titol"]) ? "value='{$_POST["titol"]}'" : "";
        $autor = isset($_POST["autor"]) ? "value='{$_POST["autor"]}'" : "";
        $isbn = isset($_POST["isbn"]) ? "value='{$_POST["isbn"]}'" : "";
        $prestec = isset($_POST["prestec"]) ? "value='{$_POST["prestec"]}'" : "";
        $dataprestec = isset($_POST["dataprestec"]) ? "value='{$_POST["dataprestec"]}'" : "";
        $idusuari = isset($_POST["idusuari"]) ? "value='{$_POST["idusuari"]}'" : "";
        if($_POST['metodo'] == "PUT") echo "<input type='hidden' value='{$_POST["titol"]}' name='nom_anterior'>";
        echo "
       
        <input type='hidden' value='{$metodo}' name='tipus'>
        

        <label for='titol'>Títol:</label>
        <input type='text' id='titol' name='titol' {$titol} ><br>
        <label for='autor'>Autor:</label>
        <input type='text' id='autor' name='autor' {$autor}><br>
        <label for='isbn'>ISBN:</label>
        <input type='text' id='isbn' name='isbn' maxlength=13 {$isbn}><br>
        <label for='prestec'>Prestat?:</label>
        <input type='prestec' id='prestec' name='prestec' {$prestec}><br>
        <label for='dataprestec'>Data prestec:</label>
        <input type='text' id='dataprestec' name='dataprestec' {$dataprestec} placeholder='dd/mm/aaaa'><br>
        <label for='idusuari'>ID de l'usuari:</label>
        <input type='text' id='idusuari' name='idusuari' {$idusuari}><br>

        <input type='submit' value='Afegir'>";
        
        ?>
        


    </form>
    
</body>
</html>