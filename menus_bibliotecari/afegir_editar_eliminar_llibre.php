<?php

session_start();
$filename="../llibres.csv";

if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}

if(isset($_POST["tipus"])) $tipus = $_POST["tipus"];

switch ($_POST["tipus"]) {
    case 'POST':
        agregar_llibre($filename);
        break;
    case 'PUT':
        modificar_llibre($filename);
        break;
    case 'DEL':
        eliminar_llibre($filename);
        break;
    default:
        echo "No hi ha res executable";
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}


function agregar_llibre($filename){
    $fitxer = fopen($filename,"a");
    if($_POST["prestec"] == "Si" && $_POST["idusuari"] !="" ){
        $dataprestec = date("Y-m-d | h:i:sa");
        $idusuario = $_POST["idusuari"];
        $prestec="Si";
    }
    elseif($_POST["prestec"] == "No" || $_POST["idusuari"] =="" ){
        $dataprestec = "0";
        $idusuario = "0";
        $prestec="No";

    }
    $linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$prestec,$dataprestec,$idusuario);
    modificar_usuari_llibre($idusuario,$prestec,$dataprestec,$_POST["isbn"]);
    fputcsv($fitxer,$linia);
    fclose($fitxer);
    header('location:../info_llibre.php');
    die();

}

function modificar_llibre($filename){
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[0] == $_POST["nom_anterior"]) {

                if($_POST["prestec"] == "Si" && $_POST["idusuari"] !=""){
                    $dataprestec = date("Y-m-d | h:i:sa");
                    $idusuario = $_POST["idusuari"];
                    $prestec="Si";
                    $isbn=$_POST["isbn"];
                    error_log("Entra por metodo 1", 0);
                }
                elseif($_POST["prestec"] == "No" || $_POST["idusuari"] =="" ){
                    $dataprestec = "0";
                    $idusuario = "0";
                    $prestec="No";
                    $isbn=$_POST["isbn"];
                    error_log("Entra por metodo 2", 0);
            
                }
                else{
                    $dataprestec = "No funciono";
                    $idusuario = "No funciono";
                    $prestec="No funciono";
                }
                $linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$prestec,$dataprestec,$idusuario);
                array_push($nuevo_csv,$linia);
                modificar_usuari_llibre($idusuario,$prestec,$dataprestec,$isbn);
                //$datos=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
                //eak;
                continue;
            }
            array_push($nuevo_csv,$datos);
        }
        fclose($gestor);
    }

    $fitxer = fopen($filename,"w");
    foreach ($nuevo_csv as $linea) {
        fputcsv($fitxer, $linea);
      }
    fclose($fitxer);
    header('location:../info_llibre.php');
    die();

    
}

function eliminar_llibre($filename){
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[0] == $_POST["titol"]) {
                eliminar_usuari_llibre($datos[2]);
                continue;
            }
            array_push($nuevo_csv,$datos);
        }
        fclose($gestor);
    }

    $fitxer = fopen($filename,"w");
    foreach ($nuevo_csv as $linea) {
        fputcsv($fitxer, $linea);
      }
    fclose($fitxer);
    header('location:../info_llibre.php');
    die();
    
}

function modificar_usuari_llibre($idusuario_n,$prestec_n,$dataprestec_n,$isbn_n){
    $filename="../usuaris.csv";
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[4] == $idusuario_n  ) {
                error_log("Añade libro a usuario", 0);
                $linia=array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$prestec_n,$dataprestec_n,$isbn_n);
                
                //$datos=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
                //eak;
                //continue;
            }
            elseif($datos[8] == $isbn_n ){
                error_log("Limpia usuario de libros", 0);
                $linia=array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],0,0,0);
                //array_push($nuevo_csv,$linia);
            }
            else{
                error_log("Else activado", 0);
                $linia=$datos;
                
            }
            array_push($nuevo_csv,$linia);
        }
        fclose($gestor);
    }

    $fitxer = fopen($filename,"w");
    foreach ($nuevo_csv as $linea) {
        fputcsv($fitxer, $linea);
      }
    fclose($fitxer);
   // header('location:../info_tots_usuaris.php');
    //die();

}

function eliminar_usuari_llibre($isbn_n){
    $filename="../usuaris.csv";
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if($datos[8] == $isbn_n){
                error_log("Limpia usuario de libros", 0);
                $linia=array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],0,0,0);
                //array_push($nuevo_csv,$linia);
            }
            else{
                $linia=$datos;
                
            }
            array_push($nuevo_csv,$linia);
        }
        fclose($gestor);
    }

    $fitxer = fopen($filename,"w");
    foreach ($nuevo_csv as $linea) {
        fputcsv($fitxer, $linea);
      }
    fclose($fitxer);

}
