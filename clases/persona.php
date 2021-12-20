<?php


abstract class Persona
{
    protected $nomcognoms;
    protected $adreca;
    protected $correu;
    protected $tel;
    protected $id;
    protected $password;
    
    public function __construct($nomcognoms,$adreca,$correu,$tel,$id,$password){
        $this->nomcognoms = $nomcognoms;
        $this->adreca = $adreca;
        $this->correu = $correu;
        $this->tel = $tel;
        $this->id = $id;
        $this->password = $password;
    }

    // Forzar la extensión de clase para definir este método
    //abstract protected function nom_de_clase();

    // Método común
    public abstract function nom_de_clase();
    public function get_id(){
        return $this->id;
    }
    public function get_name(){
        return $this->nomcognoms;
    }
    
}


?>