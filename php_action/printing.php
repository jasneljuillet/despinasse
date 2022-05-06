<?php 
    require_once('core.php');

    $id = $_GET['id'];

    $no = 0;
    $nom = "";
    $destinataire = "";
    $desc = "";
    $adresse = "";
    $poids = 0;
    $tel = 0;
    $personne = "";
    $bill = "";
    $date = "";

    $sql = "SELECT * FROM dossier INNER JOIN client on dossier.clientId = client.numClient WHERE Num_Dossier = '$id' ";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $no = $row['Num_Dossier'];
            $nom = $row['Nom'];
            $destinataire = $row['Destinataire'];
            $desc = $row['Description_collis'];
            $adresse = $row['adresse'];
            $poids = $row['Poids_collis'];
            $personne = $row['personne'];
            $tel = $row['tel'];
            $bill = $row['Bill_Lading'];
            $date = $row['Date_creation'];
        }
    } else {

    }

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
.parent {
    border: 1px solid black;
    margin: 1rem;
    padding: 2rem 2rem;
    text-align: center;
  }
  .child {
    display: inline-block;
    border: 1px solid red;
    padding: 1rem 1rem;
    vertical-align: middle;
  }
  </style>
  </head>

  <body>
  
  <div style="width: 100%; text-align: center;">
  
    <div align="left" style="width: 50%;float: left;">
    <img src="../images/entete1.png" />
    
  </div>

  <div align="left" style="width: 41.5%;float: right;">
  
  <p style="font-weight: 700;"> &nbsp;<b>No DOSSIER: </b>'.$no.'</p>
  <p><b>Date: </b>'.$date.'</p>
   </div>
</div>

<p>
  23 Ave Martin Luther King Mimine, Port-au-Prince Haiti<br>
  Tel: (509) 3611-4122 / 3389-5169<br>
  Email: beaudynelogistics1@outlook.com / beauboeufwitchill@yahoo.fr
</p>
<br>

<br><br><br><br>
<div style="margin-top: -10%; font-style: bold; font-weight: 900;">
  <p style="font-weight: bold;">Nom &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$nom.'</span><br>
    Adresse&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$adresse.'</span><br>
    Destinataire&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$destinataire.'</span><br>
    Description des collis&emsp;&emsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$desc.'</span><br>
    Poids des colis&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$poids.'g&emsp; Contact: '.$personne.'</span><br>
    AWB/BL No&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;: <span style=" font-weight: normal; text-decoration: underline;">&emsp;&emsp;&emsp;'.$bill.' Tel: '.$tel.'</span><br>
  </p>
</div>

<div align="left" style="width: 100%;  float: right; margin-top: 10%;">
<table style="width: 100%;">

<tr>
  <th colspan="1" scope="" style="border-width: 0px;"></th>
  <th colspan="1" scope="colgroup"></th>
  <th colspan="1" scope="colgroup" style="text-align:center;">Dépenses</th>
  <th colspan="2" scope="colgroup" style="text-align:center;">À facturer</th>
  <th colspan="1" scope="colgroup" style="text-align:center;">Crédit</th>
</tr>
<tr>
  <th scope="col" style="text-align:center;">Date</th>
  <th scope="col" style="text-align:center;">Descriptions</th>
  <th scope="col" style="text-align:center;">GDES/USD</th>
  <th scope="col" style="text-align:center;">GDES</th>
  <th scope="col" style="text-align:center;">USD</th>
  <th scope="col" style="text-align:center;">GDES/USD</th>
</tr>

<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
<tr>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
  <td style="height:20px;"></td>
</tr>
 </table>

<div align="left" style="width: 100%;  float: right; margin-top: 10%;">
<table style="width: 100%;  ">
<tr>
<th style="text-align:center;">OBSERVATIONS/EXPLICATIONS</th>
</tr>

    <tr>
        <td style="height: 20px;"></td>
    </tr>
    <tr>
        <td style="height: 20px;"></td>
    </tr>
    <tr>
        <td style="height: 20px;"></td>
    </tr>
    <tr>
        <td style="height: 20px;"></td>
    </tr>
    <tr>
        <td style="height: 20px;"></td>
    </tr>
    <tr>
        <td style="height: 20px;"></td>
    </tr>

</table>
</div>
</body>
  ';

  $mpdf->WriteHTML($html);
  $mpdf->Output();
?>