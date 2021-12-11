<?php

session_start();
$filename="../usuaris.csv";

if(!isset($_SESSION["usuari"])){
    header('location:index.html');
    exit;
}

if(isset($_POST["tipus"])) $tipus = $_POST["tipus"];

switch ($_POST["tipus"]) {
    case 'POST':
        agregar_usuari($filename);
        break;
    case 'PUT':
        modificar_usuari($filename);
        break;
    case 'DEL':
        eliminar_usuari($filename);
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


function agregar_usuari($filename){
    $fitxer = fopen($filename,"a");
    $linia=array($_POST["nomcognoms"],$_POST["adreca"],$_POST["correu"],$_POST["tel"],$_POST["id"],$_POST["password"],0,0,0);
    fputcsv($fitxer,$linia);
    fclose($fitxer);
    header('location:../info_tots_usuaris.php');
    die();

}

function modificar_usuari($filename){
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[4] == $_POST["id_anterior"]  ) {
                $linia=array($_POST["nomcognoms"],$_POST["adreca"],$_POST["correu"],$_POST["tel"],$_POST["id"],$_POST["password"],$datos[6],$datos[7],$datos[8]);
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
    header('location:../info_tots_usuaris.php');
    die();

    
}

function eliminar_usuari($filename){
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[4] == $_POST["id"]) {
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
    header('location:../info_tots_usuaris.php');
    die();
    
}
