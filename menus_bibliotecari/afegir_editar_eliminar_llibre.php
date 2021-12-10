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
    $linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
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
                $linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
                array_push($nuevo_csv,$linia);
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
                //$linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
                //array_push($nuevo_csv,$linia);
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
