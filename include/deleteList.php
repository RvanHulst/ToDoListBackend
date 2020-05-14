<?php
//Starts the database connection.
require  'connection.php';
//Prepares the statement to delete the list, it also deletes the tasks that are linked to the list. After that it then binds the parameters using PDO compliance and then redirects back to the index page.

$stmt = $conn->prepare("DELETE FROM lists WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt2 = $conn->prepare("DELETE FROM tasks WHERE list_id = :id");
$stmt2->bindParam(':id', $_GET['id']);

$stmt->execute();
$stmt2->execute();

$conn = null;
//it passes the url of the page of the page it came from
header('Location: ' . $_SERVER['HTTP_REFERER']);