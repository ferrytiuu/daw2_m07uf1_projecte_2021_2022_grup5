<?php
class Usuari{
    private $nomcognoms;
    private $adreca;
    private $correu;
    private $tel;
    private $id;
    private $password;
    private $llibre_prestec_estat;
    private $data_inici_prestec;
    private $isbn_libre_presctec;

    public function __construct($nomcognoms,$adreca,$correu,$tel,$id,$password,$llibre_prestec_estat,$data_inici_prestec,$isbn_libre_presctec){
        $this->$nomcognoms= $nomcognoms	;
        $this->$adreca = $adreca;
        $this->$correu = $correu;
        $this->$tel = $tel;
        $this->$id = $id;
        $this->$password = $password;
        $this->$llibre_prestec_estat = $llibre_prestec_estat;
        $this->$data_inici_prestec = $data_inici_prestec;
        $this->$isbn_libre_presctec = $isbn_libre_presctec;

    }
    public function nom_de_clase(){
        return get_class($this);
    } 
}
?>