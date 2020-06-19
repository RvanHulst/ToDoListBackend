<?php
//Starts the database connection.
require "../include/connection.php";
//Prepares the statement to delete the task, it then binds the parameters using PDO compliance and then redirects back to the list page.
$stmt = $conn->prepare("DELETE FROM tasks WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();

$conn = null;
//it passes the url of the page of the page it came from
header("location:../view/showList.php?id=" .  $_GET['list_id']);