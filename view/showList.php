
<?php //Starts the database connection.
require '../include/connection.php';

//Prepares and executes the statement getting the ID of the list you are currently in.
$stmt = $conn->prepare("SELECT * FROM `lists` WHERE `id` = :id");
$stmt->bindParam('id', $_GET['id']);
$stmt->execute();

$result = $stmt->fetch();

//Prepares and executes the statement fetching all the tasks that are linked to the above List ID.
$stmt2 = $conn->prepare("SELECT * FROM tasks WHERE list_id = :list_id");
$stmt2->bindParam(':list_id', $_GET['id']);
$stmt2->execute();

$infotask = $stmt2->fetchAll();
$conn = null;
require "../include/head.php";
?>
    <div class="container">
        <h1><?php echo $result['name'] ?></h1>
        <table class="table">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" onclick="filterTasks('Alles')" class="btn btn-secondary">Alle taken</button>
                <button type="button" onclick="filterTasks('Nog niet begonnen')" class="btn btn-secondary">Nog niet begonnen</button>
                <button type="button" onclick="filterTasks('Bezig')" class="btn btn-secondary">Bezig</button>
                <button type="button" onclick="filterTasks('Afgemaakt')" class="btn btn-secondary">Afgemaakt</button>

            </div>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Duur in minuten</th>
                </tr>
            </thead>
            <tbody>
                <?php //Puts all the tasks in a table with a foreach loop.
                foreach ($infotask as $row) {
                ?>
                    <tr class="tasksTable <?php echo $row['status'] ?>">
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['duration'] ?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href='updateTask.php?id=<?php echo $row['id'] ?>&list_id=<?php echo $row["list_id"]?>'>Edit</i>
                            </a>
                            <a class="btn btn-danger" href='deleteTask.php?id=<?php echo $row['id'] ?>&list_id=<?php echo $row["list_id"]?>'>Delete</i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <div class="col-12 text-center">
            <a class="btn btn-danger text-white" href="overview.php">Terug naar Overview</a>
            <a class="btn btn-primary text-white" href="createTask.php?id=<?php echo $result['id'] ?>&list_id=<?php echo $row["list_id"]?>">Nieuwe taak aanmaken</a>
        </div>
    </div>
<?php
require "../include/footer.php";
?>
