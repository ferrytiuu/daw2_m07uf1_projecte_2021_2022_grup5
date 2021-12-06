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
    public function mostrar_info(){

        return "<tr>
            <th>Nom d'usuari</th>
            <td>{$this->nomcognoms}</td>
        </tr>
        <tr>
            <th>Adreça</th>
            <td>{$this->adreca}</td>
        </tr>
        <tr>
            <th>Correu</th>
            <td>{$this->correu}</td>
        </tr>
        <tr>
            <th>Telèfon</th>
            <td>{$this->tel}</td>
        </tr>
        <tr>
            <th>ID</th>
            <td>{$this->id}</td>
        </tr>
        <tr>
            <th>Contrasenya</th>
            <td>{$this->password}</td>
        </tr>
        <tr>
            <th>Estat del llibre en prestec</th>
            <td>{$this->llibre_prestec_estat}</td>
        </tr>
        <tr>
            <th>Data inici del prestec</th>
            <td>{$this->data_inici_prestec}</td>
        </tr>
        <tr>
            <th>ISBN del llibre en prestec</th>
            <td>{$this->isbn_libre_presctec}</td>
        </tr>";
        
    }
}
