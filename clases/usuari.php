<?php

include_once 'persona.php';
class Usuari extends Persona{
    
    
    private $llibre_prestec_estat;
    private $data_inici_prestec;
    private $isbn_libre_presctec;

    public function __construct($nomcognoms,$adreca,$correu,$tel,$id,$password,$llibre_prestec_estat,$data_inici_prestec,$isbn_libre_presctec){
        $this->nomcognoms= $nomcognoms	;
        $this->adreca = $adreca;
        $this->correu = $correu;
        $this->tel = $tel;
        $this->id = $id;
        $this->password = $password;
        $this->llibre_prestec_estat = $llibre_prestec_estat;
        $this->data_inici_prestec = $data_inici_prestec;
        $this->isbn_libre_presctec = $isbn_libre_presctec;

    }
    /*
    public function nom_de_clase(){
        return get_class($this);
    } */
    public function mostrar_info($tipus_usuari){
        return "
        <tr>
            <td>{$this->nomcognoms}</td>
            <td>{$this->adreca}</td>
            <td>{$this->correu}</td>
            <td>{$this->tel}</td>
            <td>{$this->id}</td>
            <td>{$this->password}</td>
            <td>{$this->llibre_prestec_estat}</td>
            <td>{$this->data_inici_prestec}</td>
            <td>{$this->isbn_libre_presctec}</td>
        
            <td>
                <form action='menus_bibliotecari/afegirmodificar_usuari.php' method='POST'>
                    <input type='hidden' name='metodo' value='PUT'>
                    <input type='hidden' name='nomcognoms' value='{$this->nomcognoms}'>
                    <input type='hidden' name='correu' value='{$this->correu}'>
                    <input type='hidden' name='tel' value='{$this->tel}'>
                    <input type='hidden' name='id' value='{$this->id}'>
                    <input type='hidden' name='password' value='{$this->password}'>
                    <input type='hidden' name='llibre_prestec_estat' value='{$this->llibre_prestec_estat}'>
                    <input type='hidden' name='data_inici_prestec' value='{$this->data_inici_prestec}'>
                    <input type='hidden' name='isbn_libre_presctec' value='{$this->isbn_libre_presctec}'>
                    <input type='submit' value='Modifica usuari'>
                </form>
                <form action='menus_bibliotecari/afegir_editar_eliminar_usuari.php' method='POST'>
                    <input type='hidden' value='DEL' name='tipus'>
                    <input type='hidden' name='id' value='{$this->id}'>
                    <input type='submit' value='Elimina usuari'>
                </form>
            </td>
        </tr>";

    }
}
