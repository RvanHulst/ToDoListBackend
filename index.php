<?php 
header('Content-type: text/html; charset=iso-8859-1');  
// Create connection
$servername = "localhost";
$username = "root";
$password = "mysql";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>ToDoList</title>
 	<link rel="stylesheet" type="text/css" href="main.css">
 </head>
 <body>
 	<p>Hello world</p>
 
 </body>
 </html>