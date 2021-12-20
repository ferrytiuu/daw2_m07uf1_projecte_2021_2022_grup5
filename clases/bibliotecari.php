<?php

include_once 'persona.php';
class Bibliotecari extends Persona{

    private $ssocial;
    private $primerdia;
    private $salari;
    private $cap;
            
    public function __construct($nomcognoms,$adreca,$correu,$tel,$id,$password,$ssocial,$primerdia,$salari,$cap){
        parent::__construct($nomcognoms,$adreca,$correu,$tel,$id,$password);
        $this->ssocial = $ssocial;
        $this->primerdia = $primerdia;
        $this->salari = $salari;
        $this->cap = $cap;
    }
    
    public function __destruct()
    {
        error_log("Destructor utilizat sobre Bibliotecari {$this->nomcognoms} eliminat", 0);
    }
          
    public function mostrar_info($tipus_usuari){
        $cadena= "
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
        ";

        if($tipus_usuari=="Bibliotecari_cap"){
            $cadena.="<td>
            <form action='menus_bibliotecari/afegirmodificar_bibliotecari.php' method='POST'>
                <input type='hidden' name='metodo' value='PUT'>
                <input type='hidden' name='nomcognoms' value='{$this->nomcognoms}'>
                <input type='hidden' name='adreca' value='{$this->adreca}'>
                <input type='hidden' name='correu' value='{$this->correu}'>
                <input type='hidden' name='tel' value='{$this->tel}'>
                <input type='hidden' name='id' value='{$this->id}'>
                <input type='hidden' name='password' value='{$this->password}'>
                <input type='hidden' name='ssocial' value='{$this->ssocial}'>
                <input type='hidden' name='salari' value='{$this->salari}'>
                <input type='hidden' name='cap' value='{$this->cap}'>
                <input type='submit' value='Modifica bibliotecari'>
            </form>
            <form action='menus_bibliotecari/afegir_editar_eliminar_usuari.php' method='POST'>
                <input type='hidden' value='DEL' name='tipus'>
                <input type='hidden' name='id' value='{$this->id}'>
                <input type='hidden' name='cap' value='{$this->cap}'>
                <input type='submit' value='Elimina bibliotecari'>
            </form>
        </td>";
        }
        $cadena.="</tr>";
        return $cadena;
    }
    public function nom_de_clase(){
        if($this->cap!=="false"){
            return  get_class($this) ."_cap";
        }else{
            return get_class($this);
        }
    }
}
