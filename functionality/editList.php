<?php
//Checks if there is anything in the POST for the property list_name, if so executes the updateList function.
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Starts the database connection.
    require '../include/connection.php';
    //Prepares the statement to update the list, it then binds the parameters using PDO compliance and then redirects back to the index page.

    $stmt = $conn->prepare("UPDATE lists SET name = :name, categorie=:categorie WHERE id=:id");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':categorie', $_POST['categorie']);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $conn = null;
    header("Location: ../view/overview.php");
};