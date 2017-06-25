<?php

echo "Test Openshift!<br>";
$servername = "mariadb";
$username = "demo";
$password = "changemoi";
$dbname = "sampledb";

$conn = new mysqli(
	$servername,
	$username,
	$password,
	$dbname
);

if ($conn->connect_error) {
	    die('Connexion impossible : ' . $conn->connect_error);
}

$sql = "CREATE TABLE MaTable (
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
	echo "Table MaTable created successfully";
	echo "\n";
} else {
	echo "Error creating table Matable: " . $conn->error;
	echo "\n";
}

$sql = "CREATE TABLE Form (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    message VARCHAR(250),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
	echo "Table Form created successfully";
	echo "\n";
} else {
	echo "Error creating table Form: " . $conn->error;
	echo "\n";
}


$sql = "INSERT INTO MaTable (firstname, lastname, email)
	VALUES ('Gandalf', 'Doe', 'gandalf@example.com');";
$sql .= "INSERT INTO MaTable (firstname, lastname, email)
	VALUES ('Aragorn', 'Moe', 'aragorn@example.com');";
$sql .= "INSERT INTO MaTable (firstname, lastname, email)
	VALUES ('Frodon', 'Dooley', 'frodon@example.com');";
$sql .= "INSERT INTO MaTable (firstname, lastname, email)
	VALUES ('gouloum', 'Dooley', 'frodon@example.com')";

if ($conn->multi_query($sql) === TRUE) {
	echo "New records created successfully";
	echo "\n";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

