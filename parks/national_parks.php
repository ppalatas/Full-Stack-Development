<?php

require __DIR__ . '/db_connection.php';


function pageController(){

	$_GET;

	$data = [];

	if(isset($_GET['page'])){
		$data['page'] = $_GET['page'];

	} else {

		$data['page'] = 1;
	}

	if($data['page'] < 1 || !is_numeric($data['page'])){
		$data['page'] = 1;
		header ("location: national_parks.php?page=1");
	} elseif ($data['page'] >= 3 || !is_numeric($data['page'])){
		$data['page'] = 3;
		echo "Last Page";
	}
	return $data;
}

extract(pageController());
	
	$limit = 4;

	$offSet = "offset" . " " . ($page -1) * $limit; 

	$select = "SELECT * FROM national_parks limit " . $limit . " " . $offSet;

	$statement  = $connection->query($select);

	$parks = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
	<head>
		<title>National Parks</title>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel = "stylesheet" href = "css/national_parks.css">
	</head>
<body>
	<center>
		<h1>National Parks</h1>
		<table>
			<tr>
				<th>Name</th>
				<th>Location</th>
				<th>Year Est.</th>
				<th>Area In Acres</th>
			</tr>

			<?php foreach($parks as $park => $rows) : ?>
				<tr>
					<td><?= $rows['name']?></td>
					<td><?= $rows['location']?></td>
					<td><?= $rows['date_established']?></td>
					<td><?= $rows['area_in_acres']?></td>
				</tr>
			<?php endforeach; ?>
		</table>
		<form method = "GET" action ="#">
		
			<?php if ($page == 1){
				  echo "<button type = 'submit' name = 'page' value = '" . ($page +1) . "'>Next</button>";
				} else {
					echo "<button type = 'submit' name = 'page' value = '" . ($page -1) . "'>Previous</button>";
					echo "<button type = 'submit' name = 'page' value = '" . ($page +1) . "'>Next</button>";
				}
			?>
			
		</form>
	</center>
</body>
</html>
