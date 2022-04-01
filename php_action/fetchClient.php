<?php 
		require_once'core.php';
		$sql ="SELECT numClient, nomClient,adresse,phone FROM client ORDER BY numClient DESC";

		$result = $connect->query($sql);
		$output = array('data' =>array());
		if($result->num_rows > 0)
		{
				while($row =$result->fetch_array())
				{ 
					$clientId = $row[0];
										$button ='<div class="btn-group">
						  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Action <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
						    <li><a type="button" data-toggle="modal" data-target="#editClientModal" onclick="editClient('.$clientId.')"><i class="glyphicon glyphicon-edit"></i>Edit</a></li>
						    <li><a type="button" data-toggle="modal" data-target="#removeClientModal" onclick="removeClient('.$clientId.')"><i class="glyphicon glyphicon-trash"></i>Remove</a></li>
						   
						  </ul>
						</div>';
						
						$output['data'][] = array(
							$row[0],
							$row[1],
							$row[2],
							$row[3],
							$button
							
						);
			
						
						
					
				}						
			$connect->close();
		echo json_encode($output);
		
		}
	
		

 ?>