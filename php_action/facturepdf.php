
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
    <th>No Proforma</th>
  </tr>
  <tr>
    <td>'.$dataCreation.'</td>
    <td>'.$numDossier.'</td>
  </tr>
</table>
   </div>
</div>

<p>
  23 Ave Martin Luther King Mimine, Port-au-Prince Haiti<br>
  Tel: (509) 3611-4522 / 3389-5169<br>
  Email: despinasse@gmail.com / desinnasse@gmail.com
</p>

<div style="width: 100%; text-align: center;">
  
<div align="left" style="width: 50%;float: left;">
<table style="width: 100%;">
<tr>
    <th style="text-align:center; background-color: gray;">Client</th>
  </tr>
  <tr>
    <td>'.$nomClient.'<br>'.$adresse.'.<br>'.$phone.'</td>
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
<td>Import<br>Personnal</td>
<td>Maritime<br>Aerienne<br>Tairrain</td>
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
  for($j = 0; $j < count($mg); $j++) {
      $html .='<td>'.$mg[$i][$j].'</td>';
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
jksadddddddddddsaaaaaaaaaaaaaskjdasssssssssss 
</p>

<p>
<strong>Nom Dossier: </strong>'.$nom.'<br>
<strong>Type Dossier: </strong>'.$typeDossier.'<br>
<strong>Poid Collis: </strong>'.$poidsCollis.' (g)<br>
<strong>Description Collis: </strong>'.$descriptionCollis.'<br>
</p>


<div class="footer">
  <p>
<img src="../images/entete1.png" />
</p>

<p>
  Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
  Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, 
  when an unknown printer took a galley
  </p>
</div>

</body>
  ';
  $mpdf->WriteHTML($html);
  $mpdf->output();
?>