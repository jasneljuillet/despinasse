
<?php 

require('core.php');


$client = $_POST['clientName'];
$adresse = "";
$nomClient = "";
$phone = "";
$clientId = "";
$numDossier = "";
$nom = "";
$typeDossier = "";
$dataCreation = "";
$destinataire = "";
$descriptionCollis = "";
$poidsCollis = "";
$bill = "";

$prix = [];
$quantite = [];
$serviceId = "";
$serviceName = [];
$sql = "SELECT * FROM dossier INNER JOIN client on dossier.clientId = client.numClient INNER JOIN service on dossier.num_Dossier = service.dossier where dossier.nom = '$client' ";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $nomClient = $row['nomClient'];
       $adresse = $row['adresse'];
       $phone = $row['phone'];
       $clientId = $row['numClient'];
       $nom = $row['Nom'];
       $numDossier = $row['Num_Dossier'];
       $dataCreation = $row['Date_creation'];
       $typeDossier = $row['TypeDossier'];
       $destinataire = $row['Destinataire'];
       $descriptionCollis = $row['Description_collis'];
       $poidsCollis = $row['Poids_collis'];
       $bill = $row['Bill_Lading'];
       $prix[] = $row['prix'];
       $quantite[] = $row['quantite'];
       $serviceId = $row['id'];
       $serviceName[] = $row['nom'];
    //header("Location:../findclient.php?id=".$row['clientId']."&dossierid=".$row['Num_Dossier']."&nom=".$client  );
   }
 } else {
   echo "<script type='text/javascript'> alert('Ce Dossier est vide, veiller de le remplir avant de faire une demande de facture') 
   window.location.replace('../../systeme_beaudyne/report.php');
   </script>";
 }

?> 

<?php 
  require_once('../vendor/autoload.php');

  $mpdf = new \Mpdf\Mpdf();
echo $dataCreation;
  $html = '
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
  }

  </style>
  <img src="../images/entete1.png" />
  <table style="width:100%">
  <tr>
    <th>No Client</th>
    <td>'.$clientId.'</td>
  </tr>
  <tr>
    <th>No Dossier</th>
    <td>'.$numDossier.'</td>
  </tr>
  <tr>
    <th>Nom Client</th>
    <td>'.$nomClient.'</td>
  </tr>
  <tr>
    <th>Service</th>
    <td>' ;
    foreach($serviceName as $s) {
    
    }'</td>
  </tr>
</table>
  ';
  $mpdf->WriteHTML($html);
  $mpdf->output();
?>