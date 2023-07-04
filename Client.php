<?php 
class Client{
    private string $_nom;
    private string $_prenom;
    private array $_reservations=[];

    public function __construct(string $nom,string $prenom) {
        $this->_nom=$nom;
        $this->_prenom=$prenom;
    }

    public function getNom(){
        return $this->_nom;
    }
    public function setNom(string $nom){
        $this->_nom=$nom;
    }
    public function getPrenom(){
        return $this->_prenom;
    }
    public function setPrenom(string $prenom){
        $this->_prenom=$prenom;
    }
    public function getReservations(){
        return $this->_reservations;
    }
    public function setReservations(Reservation $reservation) {
        array_push($this->_reservations,$reservation);
    }
    public function __toString(){
        return $this->_prenom." ".strtoupper($this->_nom);  
    }   
    //affiche les reservations du client, et affiche le prix total en utilisant calcul_Prix();
    public function Reservations(){
        $retour= "Réservations de $this <br>".count($this->_reservations)." RESERVATIONS";
        $total=0;
        foreach($this->_reservations as $reservation){
            $retour.= "<br> Hotel : ".$reservation->getChambre()->getHotel()." / ".
            $reservation->getChambre()." du ".$reservation->getDebut()." au ".$reservation->getFin();
            $total+=$reservation->calcul_Prix();
        }
        return $retour.= "<br>Total : $total € <br><br><br>";
    }
        
}


?>