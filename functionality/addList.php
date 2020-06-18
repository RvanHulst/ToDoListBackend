<?php
require "../include/connection.php";
//Checks if there is anything in the POST for the property name, if so executes the createList function.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Prepares the statement to create the list, it then binds the parameter using PDO compliance and then redirects back to the index page.
    $stmt = $conn->prepare("INSERT INTO lists (name , categorie) VALUES (:name, :categorie)");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':categorie', $_POST['categorie']);
    $stmt->execute();
};
header("Location:../view/overview.php");