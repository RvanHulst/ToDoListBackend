<?php //Starts the database connection. 
require_once 'connection.php';
//Prepares and executes the statement getting the ID of the list you are currently in. 
$stmt = $conn->prepare("SELECT * FROM lists WHERE id=:id"); 
$stmt->bindParam(':id', $_GET['id']); 
$stmt->execute(); 
$result = $stmt->fetchAll(); 
 
$conn = null; 
//Checks if the server got a post request , if so executes the createTask function. 
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    
    require_once 'connection.php';
    //Prepares the statement to create the tasks, it then binds the parameters using PDO compliance and then redirects back to the list page. 
    $stmt = $conn->prepare("INSERT INTO tasks (name, description, list_id, duration, status) VALUES (:name, :description, :list_id, :duration, :status)"); 
    $stmt->bindParam(':name', $_POST['name']); 
    $stmt->bindParam(':description', $_POST['description']); 
    $stmt->bindParam(':list_id', $_GET['id']); 
    $stmt->bindParam(':duration', $_POST['duration']); 
    $stmt->bindParam(':status', $_POST['status']); 
    $stmt->execute(); 
    $conn = null; 
 
    header("location:showList.php?id=" . $_GET["id"]); 
}; 
    require "head.php";
?> 
 
<body> 
    <div class="container"> 
<?php foreach($result as $row){ ?><h1>Taak toevoegen aan lijst "<?php echo $row['name'] ?>"</h1><?php } ?> 
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
            <button type="submit" class="btn btn-primary">Taak toevoegen aan lijst</button> 
        </form> 
    </div> 
</body> 
 
</html>