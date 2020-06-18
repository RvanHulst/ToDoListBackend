<?php //Starts the database connection. 
require '../include/connection.php';
//Prepares and executes the statement getting the name of the list you are currently in. 
$stmt = $conn->prepare("SELECT * FROM lists WHERE id=:id"); 
$stmt->bindParam(':id', $_GET['id']); 
$stmt->execute(); 
$result = $stmt->fetchAll(); 
$conn = null; 

    require "../include/head.php";
?> 
    <div class="container"> 
<?php foreach($result as $row){ ?><h1>Taak toevoegen aan lijst "<?php echo $row['name'] ?>"</h1> 
        <form method="POST" action='../functionality/addTask.php?id=<?php echo $_GET['id'] ?>'><?php } ?>
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
<?php 
require '../include/footer.php';
?>