<?php
//Starts the database connection.
require '../include/connection.php';

//Prepares and executes the statement getting the ID of the list you are currently in.
$stmt = $conn->prepare("SELECT * FROM lists WHERE id=:id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();

$result = $stmt->fetch();
$conn = null;

require "../include/head.php";
?>
    <div class="container">
        <h1>Lijst Info aanpassen</h1>
        <form method="POST" action='../functionality/editList.php?id=<?php echo $result['id'] ?>'>
            <div class="form-group">
                <label for="name">Lijstnaam</label>
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" placeholder="<?php echo $result['name'] ?>" required>
                <label for="name">categorie</label>
                <input type="text" class="form-control" name="categorie" value="<?php echo $result['categorie'] ?>" placeholder="<?php echo $result['categorie'] ?>" required>
            </div>
            <button type=" submit" class="btn btn-primary">List aanpassen</button>
        </form>
    </div>

<?php 
require '../include/footer.php';
?>
