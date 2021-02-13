<html>
	<head>
		<title>Connect to MariaDB Server</title>
	</head>

	<body>
    <?php
		$servername = 'localhost:3307';
		$username = 'root';
		$password = 'root';
		$dbname = 'test';
		$dbname = 'dataset_db';
         
		$conn = new mysqli($servername, $username, $password, $dbname);

		if($conn->connect_error):
			die("Connection failed: " . $conn->connect_error);
		endif;
		echo 'Connected successfully';
		echo "<hr>";
		
		$sql = "INSERT INTO user (name) VALUES ('".'XYZ'.rand(1,999999999)."')";
		if ($conn->query($sql) === TRUE):
			echo "New record created successfully";
		else:
			echo "Error: " . $sql . "<br>" . $conn->error;
		endif;
		echo "<hr>";
		
		$sql = "SELECT * FROM user ";
		$data = $conn->query($sql);
		while($information = $data->fetch_object()):
			echo $information->name.'<br>';
		endwhile;

		$conn->close();
    ?>
	</body>
</html>