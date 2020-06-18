<?php
require 'include/connection.php';
//Checks if the server got a post request , if so executes the createTask function. 
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    var_dump($_GET['id']);
    //Prepares the statement to create the tasks, it then binds the parameters using PDO compliance and then redirects back to the list page. 
    $stmt = $conn->prepare("INSERT INTO tasks (name, description, list_id, duration, status) VALUES (:name, :description, :list_id, :duration, :status)"); 
    $stmt->bindParam(':name', $_POST['name']); 
    $stmt->bindParam(':description', $_POST['description']); 
    $stmt->bindParam(':list_id', $_GET['id']); 
    $stmt->bindParam(':duration', $_POST['duration']); 
    $stmt->bindParam(':status', $_POST['status']); 
    $stmt->execute(); 
    $conn = null;
}; 
header("location:../view/showList.php?id=" . $_GET["id"]);  