<?php 
		require_once'core.php';
		$sql ="SELECT Id,client,sales,dateSales FROM customer ORDER BY Id DESC";

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
						    <li><a type="button" data-toggle="modal" data-target="#editFolderModal" onclick="addService('.$clientId.')"><i class="glyphicon glyphicon-edit"></i>Facturer</a></li>
						  </ul>
						</div>';
						
						$output['data'][] = array(
							$row[0],
							$row[3],
							$row[1],
							$button
							
						);
			
						
						
					
				}						
			$connect->close();
		echo json_encode($output);
		
		}
	
		

 ?>