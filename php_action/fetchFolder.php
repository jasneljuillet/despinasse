<?php 
		require_once'core.php';
		$sql ="SELECT Num_Dossier, Nom, TypeDossier,Date_creation,Destinataire, Description_collis, Poids_collis, Bill_Lading FROM dossier ORDER BY Num_Dossier DESC";

		$result = $connect->query($sql);
		$output = array('data' =>array());
		if($result->num_rows > 0)
		{
				while($row =$result->fetch_array())
				{ 
					$folderId = $row[0];
										$button ='<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><a type="button" data-toggle="modal" data-target="#editFolderModal" onclick="editFolder('.$folderId.')"><i class="glyphicon glyphicon-edit"></i>Edit</a></li>
						    <li><a type="button" data-toggle="modal" data-target="#removeFolderModal" onclick="removeFolder('.$folderId.')"><i class="glyphicon glyphicon-trash"></i>Remove</a></li>
						   
						  </ul>
						</div>';
						
						$output['data'][] = array(
							$row[0],
							$row[1],
							$row[2],
							$row[3],
							$row[4],
							$row[5],
							$row[6],
							$row[7],
							$button
							
						);
			
						
						
					
				}						
			$connect->close();
		echo json_encode($output);
		
		}
	
		

 ?>