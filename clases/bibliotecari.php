<?php

include_once 'persona.php';
class Bibliotecari extends Persona{

    private $ssocial;
    private $primerdia;
    private $salari;
    private $cap;
            
    public function __construct($nomcognoms,$adreca,$correu,$tel,$id,$password,$ssocial,$primerdia,$salari,$cap){
        $this->nomcognoms = $nomcognoms;
        $this->adreca = $adreca;
        $this->correu = $correu;
        $this->tel = $tel;
        $this->id = $id;
        $this->password = $password;
        $this->ssocial = $ssocial;
        $this->primerdia = $primerdia;
        $this->salari = $salari;
        $this->cap = $cap;
    }
            
    /*public function nom_de_clase(){
        return get_class($this);
    } */

    public function mostrar_info(){

        return "<tr>
            <th>Nom d'usuari</th>
            <th>Adreça</th>
            <th>Correu</th>
            <th>Telèfon</th>
            <th>ID</th>
            <th>Contrasenya</th>
            <th>Seguretat Social</th>
            <th>Primer dia</th>
            <th>Salari</th>
            <th>És cap?</th>
        </tr>
        <tr>
            <td>{$this->nomcognoms}</td>
            <td>{$this->adreca}</td>
            <td>{$this->correu}</td>
            <td>{$this->tel}</td>
            <td>{$this->id}</td>
            <td>{$this->password}</td>
            <td>{$this->ssocial}</td>
            <td>{$this->primerdia}</td>
            <td>{$this->salari}</td>
            <td>{$this->cap}</td>
        </tr>";
    }
}
?>