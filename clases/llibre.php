<?php

class Llibre{

    private $titol;
    private $autor;
    private $isbn;
    private $prestec;
    private $dataprestec;
    private $idusuari;
            
    public function __construct($titol,$autor,$isbn,$prestec,$dataprestec,$idusuari){
        $this->titol = $titol;
        $this->autor = $autor;
        $this->isbn = $isbn;
        $this->prestec = $prestec;
        $this->dataprestec = $dataprestec;
        $this->idusuari = $idusuari;
    }
            
    public function agregar_llibre(){
        
    }

    public function mostrar_info($tipus_usuari){


        $cadena= "<tr>
            <td>{$this->titol}</td>
            <td>{$this->autor}</td>
            <td>{$this->isbn}</td>
            <td>{$this->prestec}</td>
            <td>{$this->dataprestec}</td>
            <td>{$this->idusuari}</td>";

        if($tipus_usuari=="Bibliotecari"){
            $cadena.="<td>
            <form action='menus_bibliotecari/afegirmodificar_llibre.php' method='POST'>
                <input type='hidden' name='metodo' value='PUT'>
                <input type='hidden' name='titol' value='{$this->titol}'>
                <input type='hidden' name='autor' value='{$this->autor}'>
                <input type='hidden' name='isbn' value='{$this->isbn}'>
                <input type='hidden' name='prestec' value='{$this->prestec}'>
                <input type='hidden' name='dataprestec' value='{$this->dataprestec}'>
                <input type='hidden' name='idusuari' value='{$this->idusuari}'>
                <input type='submit' value='Modifica llibre'>
            </form>
            <form action='menus_bibliotecari/afegir_editar_eliminar_llibre.php' method='POST'>
                <input type='hidden' value='DEL' name='tipus'>
                <input type='hidden' name='titol' value='{$this->titol}'>
                <input type='submit' value='Elimina llibre'>
            </form>
        </td>";
        }
        $cadena.="</tr>";
        return $cadena;
    }

}
?>