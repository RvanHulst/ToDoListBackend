<?php //Starts the database connection.
include __DIR__ . '\head.php';

//Prepares and executes the statement getting the ID of the task you are currently in.
$stmt = $conn->prepare("SELECT * FROM tasks WHERE id=:id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();
$result = $stmt->fetch();

$conn = null;
//Checks if there is anything in the POST for the property task_name, if so executes the updateTask function.
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    //Starts the database connection.
    include 'connection.php';
    //Prepares the statement to update the task, it then binds the parameters using PDO compliance and then redirects back to the list page
    $stmt = $conn->prepare("UPDATE tasks SET name=:name, description=:description, duration=:duration, status=:status WHERE id=:id"); 
    $stmt->bindParam(':id', $_GET['id']); 
    $stmt->bindParam(':name', $_POST['name']); 
    $stmt->bindParam(':description', $_POST['description']); 
    $stmt->bindParam(':duration', $_POST['duration']); 
    $stmt->bindParam(':status', $_POST['status']); 
    $stmt->execute(); 

    header("location:showList.php?id=" .  $_GET['list_id']);

};
?>

<body>
    <div class="container">
        <h1>Taak "<?php echo $result['name'] ?>" aanpassen</h1>
        <form method="POST">
        <div class="form-group"> 
                <label for="name">Taak Naam: </label> 
                <input type="text" class="form-control" name="name" placeholder="Voer hier uw Taaknaam in" required> 
            </div> 
            <div class="form-group"> 
                <label for="name">description: </label> 
                <input type="text" class="form-control" name="description" placeholder="Voer hier uw taakbeschrijving in" required> 
            </div> 
            <div class="form-group"> 
                <label for="duration">Tijd benodigd (in minuten):</label> 
                <input type="number" class="form-control" name="duration" max="1440" required> 
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
</body>
</html>