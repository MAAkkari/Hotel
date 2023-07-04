<?php 

class Reservation{
    private Chambre $_chambre;
    private Client $_client;
    private DateTime $_debut;
    private DateTime $_fin;


public function __construct(Chambre $chambre,Client $client,string $debut, string $fin) {
    $client->setReservations($this);
    $chambre->setReservations($this);
    $this->_debut = new DateTime($debut);
    $this->_fin = new DateTime($fin);
    $this->_client=$client;
    $this->_chambre=$chambre;

}
public function getChambre(){
    return $this->_chambre;
}
public function setChambre(chambre $chambre){
    $this->_chambre=$chambre;
}
public function getClient(){
    return $this->_client;
}
public function setClient(client $client){
    $this->_client=$client;
}
public function getDebut(){
    return $this->_debut->format("d-m-Y");
}
public function setDebut(string $debut){
    $this->_debut = new DateTime($debut);
}
public function getFin(){
    return $this->_fin->format("d-m-Y");
}
public function setFin(string $fin){
    $this->_fin = new DateTime($fin);
}
public function __toString(){ 
    return "$this->_client - Chambre : ".$this->_chambre->getNumero()." - du "
    .$this->_debut->format("d-m-Y")." au ".$this->_fin->format("d-m-Y");

}//calcul la diff entre date debut et fin de la reservation et multiplie le nombre de jours par le prix de la chambre
public function calcul_Prix(){ 
    return $this->_chambre->getPrix()*$this->_debut->diff($this->_fin)->days;
}
}
























?>