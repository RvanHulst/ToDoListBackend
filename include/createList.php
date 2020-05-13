
<?php

include __DIR__ . '\head.php';

//Checks if there is anything in the POST for the property name, if so executes the createList function.
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    //Connects to the Database.
    require __DIR__ . '\connection.php';
    //Prepares the statement to create the list, it then binds the parameter using PDO compliance and then redirects back to the index page.
    $stmt = $conn->prepare("INSERT INTO lists (name) VALUES (:name)");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->execute();

    header("Location: ../overview.php");
};
?>


<body>
    <div class="container">
        <h1>Nieuwe lijst aanmaken</h1>
        <form method="POST">
            <div class="form-group">
                <label>Lijstnaam</label>
                <input type="text" class="form-control" name="name" placeholder="Voer hier uw lijstnaam in" required>
            </div>
            <button type="submit" class="btn btn-primary">Lijst aanmaken</button>
        </form>
    </div>
</body>

</html>