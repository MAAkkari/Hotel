<!DOCTYPE html>
<html>
<head>
    <title>Your Page Title</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

$hilton=new Hotel("Hilton",4,"Strasbourg","10 route de la gare 67000 Strasbourg");
$regent=new Hotel("Regent",4,"Paris","2 rue de w");

$Chambre3= new Chambre($hilton,2,false,120,3);
$Chambre4= new Chambre($hilton,2,false,120,4);
$Chambre5= new Chambre($hilton,2,true,300,5);
$Chambre6= new Chambre($hilton,2,true,300,6);
$Chambre8= new Chambre($hilton,2,true,300,8);
$Chambre17= new Chambre($hilton,2,true,300,17);

$client1=new Client("GIBELLO","Virgile");
$client2=new Client("MURMANN","Micka");

$Reservation1=new Reservation($Chambre3,$client2,"11-03-2021","15-03-2021");
$Reservation2=new Reservation($Chambre4,$client2,"01-04-2021","17-04-2021");
$Reservation3=new Reservation($Chambre17,$client1,"01-01-2021","02-01-2021");

echo $hilton->info(); //affiche adresse nombre de chambres, chambres reservés et chambres libres.
echo $client2->Reservations(); //affiche les reservations du client
echo $hilton->Reservations(); //affiche le nombre de reservation, les chambres reserver et la personne qui les reserves
echo $hilton->statuts(); //affiche un tableau avec les chambres leurs prix si il y a du wifi ou pas et si elles sont reservé







?>
</body>
</html>

















