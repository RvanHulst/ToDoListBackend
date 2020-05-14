<?php
//Starts the database connection.

include 'head.php';

//Prepares and executes the statement getting the ID of the list you are currently in.
$stmt = $conn->prepare("SELECT * FROM lists WHERE id=:id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();

$result = $stmt->fetch();
$conn = null;


//Checks if there is anything in the POST for the property list_name, if so executes the updateList function.
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    //Starts the database connection.

    include 'connection.php';
    //Prepares the statement to update the list, it then binds the parameters using PDO compliance and then redirects back to the index page.

    $stmt = $conn->prepare("UPDATE lists SET name = :name WHERE id=:id");
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $conn = null;
    header("Location: ../overview.php");
};
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="container">
        <h1>Lijstnaam aanpassenn</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Lijstnaam</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" placeholder="<?php echo $result['name'] ?>" required>
                <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            </div>
            <button type=" submit" class="btn btn-primary">Naam aanpassen</button>
        </form>
    </div>
</body>

</html>