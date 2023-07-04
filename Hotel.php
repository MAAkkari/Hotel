<?php 
class Hotel{
    private string $_nom;
    private int $_nbEtoiles;
    private string $_ville;
    private string $_adresse;
    private array $_chambres =[];
    

    public function __construct(string $nom,int $nbEtoiles,string $ville,string $adresse) {
        $this->_nom = $nom;
        $this->_nbEtoiles=$nbEtoiles;
        $this->_ville=$ville;
        $this->_adresse=$adresse;
    }

    public function getNom(){
        return $this->_nom;
    }
    public function setNom(string $nom) {
        $this->_nom=$nom;
    }
    public function getNbEtoiles(){
        return $this->_nbEtoiles;
    }
    public function setNbEtoiles(int $nbEtoiles) {
        $this->_nbEtoiles=$nbEtoiles;
    }
    public function getVille(){
        return $this->_ville;
    }
    public function setVille(string $ville) {
        $this->_ville=$ville;
    }
    public function getAdresse(){
        return $this->_adresse;
    }
    public function setAdresse(string $adresse) {
        $this->_adresse=$adresse;
    }
    public function getChambres(){
        return $this->_chambres;
    }
    public function setChambres(Chambre $chambre) {
        array_push($this->_chambres,$chambre);
    }
   
    public function __toString(){
        $aff= "$this->_nom " ;
        $x=$this->_nbEtoiles;
        while ($x > 0) {
                $x--;
                $aff.= "*";
            }
        $aff.=" $this->_ville";
        return $aff;
    }

    public function Info(){
        $resultat= "$this <br> $this->_adresse <br> Nombre de chambres : ".count($this->_chambres).
        "<br> Nombre de chambres réservées : "; 
        $result=0;
         foreach($this->_chambres as $chambre){
            if(count($chambre->getReservations())>0){
                $result+=1;
            }
        }
        $resultat.= $result;
        return $resultat.="<br> Nombre de chambres dispo : ".count($this->_chambres)-$result."<br><br><br>";
    }
        
    public function Reservations(){
        $retour= "Réservations de l'hôtel $this<br>";
        $result=0;
        foreach($this->_chambres as $chambre){
            if(count($chambre->getReservations())>0){
                $result+=1;}}
            if($result>0){   
                $resultat=0;
            foreach($this->_chambres as $chambre){
                $resultat+=count($chambre->getReservations());}
                $retour.= "$resultat RESERVATIONS";
            foreach($this->_chambres as $chambre){
                foreach($chambre->getReservations() as $reservation){
                    $retour.= "<br>".$reservation;
                }
            }   
        }
        else{ 
            $retour.="Aucune Réservation !";
        }
        return $retour.="<br><br><br>";
    }   
    public function statuts(){
        $resultat="Statuts des chambres de $this <br>";
        $resultat.= "<table id='status' border='0'><tr><th>CHAMBRE</th><th>PRIX</th><th>WiFi</th><th>Etat</th></tr>";
        foreach($this->_chambres as $chambre){
            $resultat.="<tr>
                <td>"."Chambre ".$chambre->getNumero()."</td>
                <td>".$chambre->getPrix()."</td>
                <td>";
                if ($chambre->getWifi()) {
                    $resultat.= '<div class="ouiFi">icone pas encore implementé</div>';
                } else {
                    $resultat.= '';
                }
                $resultat.="</td>
                <td>";
                if (count($chambre->getReservations())<1) {
                    $resultat.= '<div class="dispo">DISPONIBLE</div>';
                } else {
                    $resultat.= '<div class="indispo">RESERVE</div>';
                }
                $resultat.= "</td>
                </tr>";
        }
        return $resultat.="</table> <br><br><br>";
        
    }
}
?>