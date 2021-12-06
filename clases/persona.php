<?php


abstract class Persona
{
    protected $nomcognoms;
    protected $adreca;
    protected $correu;
    protected $tel;
    protected $id;
    protected $password;

    // Forzar la extensión de clase para definir este método
    //abstract protected function nom_de_clase();

    // Método común
    public function nom_de_clase(){
        return get_class($this);
    } 
    public function get_id(){
        return $this->id;
    }
    public function get_name(){
        return $this->nomcognoms;
    }
    public function comprovar_dades(){
        
    }
}


?>