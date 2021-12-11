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

        $usuari = "../usuaris.csv";

        $metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
        $titol = isset($_POST["titol"]) ? "value='{$_POST["titol"]}'" : "";
        $autor = isset($_POST["autor"]) ? "value='{$_POST["autor"]}'" : "";
        $isbn = isset($_POST["isbn"]) ? "value='{$_POST["isbn"]}'" : "";
        //$prestec = isset($_POST["prestec"]) && $_POST["prestec"] == true  ? "value='{$_POST["prestec"]}'" : "";
        $prestec = isset($_POST["prestec"]) && $_POST["prestec"] == "Si"  ?"

        <input type='radio' id='prestec_true' name='prestec' value='Si' checked>
        <label for='presctec_true'>Sí</label><br>
        <input type='radio' id='prestec_false' name='prestec' value='No'>
        <label for='prestec_false'>No</label><br>"
         :"
        <input type='radio' id='prestec_true' name='prestec' value='Si' >
        <label for='presctec_true'>Sí</label><br>
        <input type='radio' id='prestec_false' name='prestec' value='No' checked >
        <label for='prestec_false'>No</label><br>";
        $idusuari = isset($_POST["idusuari"]) ? "value='{$_POST["idusuari"]}'" : "";
        if ($_POST['metodo'] == "PUT") echo "<input type='hidden' value='{$_POST["titol"]}' name='nom_anterior'>";
        echo "
       
        <input type='hidden' value='{$metodo}' name='tipus'>
        

        <label for='titol'>Títol:</label>
        <input type='text' id='titol' name='titol' {$titol} ><br>
        <label for='autor'>Autor:</label>
        <input type='text' id='autor' name='autor' {$autor}><br>
        <label for='isbn'>ISBN:</label>
        <input type='text' id='isbn' name='isbn' maxlength=13 {$isbn}><br>
        <label for='prestec'>Prestat?:</label><br>
        
        {$prestec}


        <label for='idusuari'>ID de l'usuari:</label>;
        <select name='idusuari' id='idusuari' name='idusuari' >
        
        <option value='' selected='selected'></option>";
        if (($gestor = fopen('../usuaris.csv', 'r')) !== FALSE) {
            while (($datos = fgetcsv($gestor, 1000, ',')) !== FALSE) {
                for($i=0;$i<count($datos);$i++){
                        $estado= $datos[4] == $_POST['idusuari'] ? "selected='selected'" : "";
                        echo " <option value='$datos[4]' {$estado}>$datos[4]   </option>";
                        break;
                    }
                    

            }
            fclose($gestor);
        }

        echo"
        </select><br>
        <input type='submit' value='Desar'>";

        ?>

    </form>

</body>

</html>