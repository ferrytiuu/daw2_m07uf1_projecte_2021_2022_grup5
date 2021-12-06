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

    public function mostrar_info(){

        return "<tr>
            <td>{$this->titol}</td>
            <td>{$this->autor}</td>
            <td>{$this->isbn}</td>
            <td>{$this->prestec}</td>
            <td>{$this->dataprestec}</td>
            <td>{$this->idusuari}</td>
        </tr>";
        
    }
}
?>