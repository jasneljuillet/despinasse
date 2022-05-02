<?php 
    require_once('core.php');

    $id = $_GET['id'];

    $no = 0;
    $sql = "SELECT * FROM dossier WHERE Num_Dossier = '$id' ";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $no = $row['Num_Dossier'];
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
  <p><b>Date: </b>'.date("m/m/Y").'</p>
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
  <span>Nom &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;:</span> <span>&emsp;&emsp;__________________________________________________________________________</span>
  <span>Adresse &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:</span> <span>&emsp;&emsp;__________________________________________________________________________</span>
  <span>Destinataire &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:</span> <span>&emsp;&nbsp;___________________________________________________________________________</span>
  <span>Description des colis &emsp;:</span> <span>&emsp;&emsp;__________________________________________________________________________</span>
  <span>Poids des colis &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:</span> <span>&emsp;&emsp;______________________________&nbsp;Contact :&nbsp; _________________________________</span>
  <span>AWB/BL No &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:</span> <span>&emsp;&emsp;_______________________________&nbsp;Tel :&nbsp; _____________________________________</span>
 
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