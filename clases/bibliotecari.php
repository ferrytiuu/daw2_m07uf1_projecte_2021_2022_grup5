<?php
class Bibliotecari{
    private $nomcognoms;
    private $adreca;
    private $correu;
    private $tel;
    private $id;
    private $password;
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
            
    public function nom_de_clase(){
        return get_class($this);
    } 
}
?>