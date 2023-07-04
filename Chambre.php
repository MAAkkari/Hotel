<?php 
class Chambre {
    private int $_numero;
    private Hotel $_hotel;
    private int $_nbLits;
    private bool $_wifi;
    private float $_prix;
    private array $_reservations=[];

    public function __construct(Hotel $hotel,int $nbLits,bool $wifi,float $prix,int $numero) {
        $this->_nbLits= $nbLits;
        $this->_wifi = $wifi;
        $this->_prix = $prix;
        $hotel->setChambres($this); // la chambre se met dans l'array de l'hotel au quel elle appartient
        $this->_numero = $numero;
        $this->_hotel=$hotel;
    }

    public function getHotel(){
        return $this->_hotel;
    }
    public function setHotel(Hotel $hotel){
        $this->_hotel=$hotel;
    }
    public function getWifi(){
        return $this->_wifi;
    }
    public function setWifi(bool $wifi){
        $this->_wifi=$wifi;
    }
    public function getPrix(){
        return $this->_prix;
    }
    public function setPrix(float $prix){
        $this->_prix=$prix;
    }
    public function getReservations(){
        return $this->_reservations;
    }
    public function setReservations(Reservation $reservation) {
        array_push($this->_reservations,$reservation); 
    }
    public function getNbLits(){
        return $this->_nbLits;
    }
    public function setNbLits(int $nbLits){
        $this->_nbLits=$nbLits;
    }
    public function getNumero(){
        return $this->_numero;
    }
    public function setNumero(int $numero){
        $this->_numero=$numero;
    }
    public function __tostring(){ //affiche chambre : numero (nblits - prix - Wifi:oui/non) 
        $result= "Chambre : $this->_numero ($this->_nbLits Lits - $this->_prix - Wifi : ";
        if($this->_wifi){$result.="oui)";}
        else{$result.="non)";};
        return $result;
    }
    
}





























?>