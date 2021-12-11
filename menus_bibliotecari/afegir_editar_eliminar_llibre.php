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
                else{
                    $dataprestec = "No funciono";
                    $idusuario = "No funciono";
                    $prestec="No funciono";
                }
                $linia=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$prestec,$dataprestec,$idusuario);
                array_push($nuevo_csv,$linia);
                modificar_usuari_llibre($datos[5],$prestec,$dataprestec,$_POST["isbn"]);
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

function modificar_usuari_llibre($idusuario_n,$prestec_n,$dataprestec_n,$isbn_n){
    $filename="../usuaris.csv";
    $nuevo_csv =array();
    if (($gestor = fopen("$filename", "r")) !== FALSE) {
        while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
            
            if ($datos[4] == $idusuario_n and $datos[5] == $isbn_n   ) {

                $fp = fopen('../info.txt', 'w');
                fwrite($fp, '2');
                fclose($fp);

                $linia=array($datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$prestec_n,$dataprestec_n,$isbn_n);
                array_push($nuevo_csv,$linia);
                //$datos=array($_POST["titol"],$_POST["autor"],$_POST["isbn"],$_POST["prestec"],$_POST["dataprestec"],$_POST["idusuari"]);
                //eak;
                continue;
            }
            array_push($nuevo_csv,$datos);
        }
        fclose($gestor);
    }
    else{
        $fp = fopen('../info.txt', 'w');
        fwrite($fp, '2');
        fclose($fp);
    }

    $fitxer = fopen($filename,"w");
    foreach ($nuevo_csv as $linea) {
        fputcsv($fitxer, $linea);
      }
    fclose($fitxer);
   // header('location:../info_tots_usuaris.php');
    //die();

}
