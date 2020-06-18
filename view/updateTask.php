<?php //Starts the database connection.
require '../include/connection.php';

//Prepares and executes the statement getting the ID of the task you are currently in.
$stmt = $conn->prepare("SELECT * FROM tasks WHERE id=:id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$result = $stmt->fetch();

$conn = null;
//Checks if there is anything in the POST for the property task_name, if so executes the updateTask function.
require "../include/head.php";
?>
    <div class="container">
        <h1>Taak "<?php echo $result['name'] ?>" aanpassen</h1>
        <form method="POST" action='../functionality/editTask.php?id=<?php echo $result['id'] ?>'>
        <div class="form-group"> 
                <label for="name">Taak Naam: </label> 
                <input type="text" class="form-control" name="name" value="<?php echo $result['name'] ?>" placeholder="<?php echo $result['name'] ?>" required>
            </div> 
            <div class="form-group"> 
                <label for="name">description: </label> 
                <input type="text" class="form-control" name="description" value="<?php echo $result['description'] ?>" placeholder="<?php echo $result['description'] ?>" required>
            </div> 
            <div class="form-group"> 
                <label for="duration">Tijd benodigd (in minuten):</label> 
                <input type="number" class="form-control" name="duration" value="<?php echo $result['duration'] ?>" placeholder="<?php echo $result['duration'] ?>" max="1440" required>
            </div> 
            <div class="form-group"> 
                <label for="status">Status van de taak</label> 
                <select class="form-control" name="status" id="status" required> 
                    <option>Nog niet begonnen</option> 
                    <option>Bezig</option> 
                    <option>Afgemaakt</option> 
                </select> 
            </div> 
            <input type="hidden" name="id" value="<?php echo $result['id'] ?>">
            <input type="hidden" name="list_id" value="<?php echo $result['list_id'] ?>">
            <button type="submit" class="btn btn-primary">Taak Veranderen in de lijst </button>
        </form>
    </div>
<?php
    require "../include/footer.php";
?>