<?php

    //Starts the database connection.
    require '../include/connection.php';
    //Prepares the statement to update the task, it then binds the parameters using PDO compliance and then redirects back to the list page
    $stmt = $conn->prepare("UPDATE tasks SET name=:name, description=:description, duration=:duration, status=:status WHERE id=:id"); 
    $stmt->bindParam(':id', $_GET['id']); 
    $stmt->bindParam(':name', $_POST['name']); 
    $stmt->bindParam(':description', $_POST['description']); 
    $stmt->bindParam(':duration', $_POST['duration']); 
    $stmt->bindParam(':status', $_POST['status']); 
    $stmt->execute(); 

    header("location:../view/showList.php?id=" .  $_GET['list_id']);
