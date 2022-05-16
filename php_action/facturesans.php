
<?php 

require('core.php');


$client = $_GET['id'];
$check = $_GET['se'];
$adresse = "";
$nomClient = "";
$phone = "";
$clientId = "";
$numService = "";
$nom = "";
$typeDossier = "";
$dossier = $_GET['dossierid'];
$dataCreation = "";
$destinataire = "";
$descriptionCollis = "";
$poidsCollis = "";
$bill = "";
$tel = "";
$type = "";
$personne = "";
$prix = [];
$quantite = [];
$serviceId = "";
$serviceName = [];
$dossierouproformat = "";

$referene = [];
$req = "";

if(isset($check)) {
  $sql = "SELECT * FROM dossier INNER JOIN client on dossier.clientId = client.numClient INNER JOIN service on dossier.num_Dossier = service.dossier where dossier.clientId = '$client' ";
  $type = "No Dossier";
  $dossierouproformat = $_GET['dossierid'];
} else {
  $sql = "SELECT * FROM service INNER JOIN client on service.client = client.numClient INNER JOIN clienttransport on client.numClient = clienttransport.client where service.client = '$client' ";
  $type = "No Proforma";
}

$sql2 = "SELECT * FROM transport WHERE dossier = '$dossier' ";
$sql3 = "SELECT * FROM reference WHERE dossier = '$dossier' ";


$result = $connect->query($sql);
$result2 = $connect->query($sql2);
$result3 = $connect->query($sql3);

if($result2 -> num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
    $typeDossier = $row['typedossier'];
  }
}

if($result3 -> num_rows > 0) {
  while($row = $result3->fetch_assoc()) {
    $referene[] = $row['no_reference'];
  }
}

if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
       $nomClient = $row['nomClient'];

        if(empty($dossierouproformat)) {
          $dossierouproformat =  $row['id'];
        }

        if(empty($typeDossier)) {
          $typeDossier = $row['typeDossier'];
        }
        $dataCreation = date("Y/m/d");
        $serviceName[] = $row['nom'];
        $quantite[] = $row['quantite'];
        $prix[] = $row['prix'];
       $adresse = $row['adresse'];
       $phone = $row['phone'];
       $tel = $row['tel'];
       $personne = $row['personne'];
      //  $typeDossier = $row['TypeDossier'];
    //    $clientId = $row['numClient'];
    //    $nom = $row['Nom'];
    //    $numDossier = $row['Num_Dossier'];
    //    $dataCreation = $row['Date_creation'];
    //    $typeDossier = $row['TypeDossier'];
    //    $destinataire = $row['Destinataire'];
    //    $descriptionCollis = $row['Description_collis'];
    //    $poidsCollis = $row['Poids_collis'];
    //    $bill = $row['Bill_Lading'];
    //    
    //    
    //    $serviceId = $row['id'];
    //header("Location:../findclient.php?id=".$row['clientId']."&dossierid=".$row['Num_Dossier']."&nom=".$client  );
   }
 } else {
   echo "<script type='text/javascript'> alert('Ce Dossier est vide, veiller de le remplir avant de faire une demande de facture') 
   window.location.replace('../../systeme_beaudyne/report.php');
   </script>";
 }

 echo $dossierouproformat;
 function mergeArrays(...$arrays)
 {
 
     $length = count($arrays[0]);
     $result = [];
     for ($i=0;$i<$length;$i++)
     {
         $temp = [];
         foreach ($arrays as $array)
             $temp[] = $array[$i];
 
         $result[] = $temp;
     }
 
     return $result;
 
 }

 $mg = mergeArrays($serviceName, $quantite, $prix);

 $balance = 0;
 $balance = number_format($balance);

 $sumTotal = 0;
 for($z = 0; $z < count($mg); $z++) {
  $sumTotal = $sumTotal + ($quantite[$z] * $prix[$z]);
 };

 $sumTotal = number_format($sumTotal);
?> 

<?php 
  require_once('../vendor/autoload.php');

  $mpdf = new \Mpdf\Mpdf();

  $html = '

  <head>

  <style>


  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  th, td {
    padding: 5px;
    text-align: left;
  }
  .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    color: black;
    text-align: center;
 }
 .footer2 {
  position: fixed;
  left: 0;
  bottom: 30;
  width: 100%;
  color: black;
  text-align: left;
}
div.c {
  text-align: right;
} 
  </style>
  </head>

  <body>
  
  <div style="width: 100%; text-align: center;">
  
    <div align="left" style="width: 50%;float: left;">
    <img src="../images/entete1.png" />
    
  </div>

  <div align="left" style="width: 31.5%;float: right;">
  <table style="width: 100%; margin-top: -40px; ">
  <tr style="background-color: gray;">
    <th>Date</th>
    <th>'.$type.'</th>
  </tr>
  <tr>
    <td>'.$dataCreation.'</td>
    <td>'.$dossierouproformat.'</td>
  </tr>
</table>
   </div>
</div>

<p>
  23 Ave Martin Luther King Mimine, Port-au-Prince Haiti<br>
  Tel: (509) 3611-4122 / 3389-5169<br>
  Email: beaudynelogistics1@outlook.com / beauboeufwitchill@yahoo.fr
</p>

<div style="width: 100%; text-align: center;">
  
<div align="left" style="width: 50%;float: left;">
<table style="width: 100%;">
<tr>
    <th style="text-align:center; background-color: gray;">Client</th>
  </tr>
  <tr>
    <td>'.$nomClient.'<br>'.$adresse.'<br>'.$phone.'<br>'.$tel.'<br>'.$personne.'</td>
  </tr>
</table>

</div>

<div align="left" style="width: 41.5%;  float: right; margin-top: 20px;">
<table style="width: 100%; margin-top: -7%; ">
<tr style="background-color: gray;">
<th style="text-align:center;">Reference</th>
<th style="text-align:center;">Transport</th>
</tr>
<tr>
<td>';
  for($i = 0; $i < count($referene); $i++) {
    $html .=$referene[$i].'<br>';
  }
$html.=
'
</td>
<td>'.$typeDossier.'</td>
</tr>

<tr>

</tr>
</table>
</div>
</div>



<br>

  <table style="width:100%;">
  <thead>
  <tr style="background-color: gray;">
  <th style="text-align:center;">SERVICE</th>
  <th style="text-align:center;">UNITE</th>
  <th style="text-align:center;">PRIX</th>
  <th style="text-align:center;">TOTAL</th>
  <th style="text-align:center;">MONNAIE</th>
</tr>
<thead>
';

for ($i = 0; $i < count($mg); $i++) {
  $html .= '<tr>';
  for($j = 0; $j <= count($mg[$i]); $j++) { 
    if(isset($mg[$i][$j])) {
      // echo $mg[$i][$j]."</br>";
      $html .='<td>'.$mg[$i][$j].'</td>';
    } 
  }
 
  $html .= '</tr><td>'.$quantite[$i] * $prix[$i].'</td><td style="text-align:center;">USD</td>';
}
$html.=
'
<tfoot>
<tr>
<th>
</th><th style="background-color: gray;" colspan="2">SubTOTAL</th>
<td>'.$sumTotal.'</td>
<td style="text-align:center;">USD</td>
</tr>

<tr>
<th>
</th><th colspan="2">BALANCE</th>
<td>'.$balance.'</td>
<td style="text-align:center;">USD</td>
</tr>
<tr>
<th>
</th><th colspan="2">TOTAL</th>
<td>'.$sumTotal.'</td>
<td style="text-align:center;">USD</td>
</tr>
</tfoot>
</table>
<br>
<p>
<strong>NB</strong> 
Ce tarif ne tient pas compte des produits p&eacute;rissables et dangereux.Il peut-&ecirc; modifi&eacute; si le
volume varie. 
</p>
<p>
<strong>Account #: </strong>107-1022-1689054<br>
<strong>Swift Code: </strong>UBNKHTPP<br>
<strong>Bank Name: </strong>Unibank<br>
</p>

<div class="c">
<p>
_________________________________________<br>
<p style="text-align: right; margin-right:68px;">Signature autoris&eacute;e</p>
</p>
</div>

<div class="footer">
<p>
 Beaudyne logistics d&eacute;cline toutes responsabilit&eacute;s en rapport &agrave; la nature des objets 
 comportant votre colis.<br>
 <strong><i> Votre colis, votre destination. Notre expertise,notre garantie!!!</i></strong>
  </p>
</div>

</body>
  ';

  $mpdf->WriteHTML($html);
  $mpdf->Output();
?>