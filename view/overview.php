
<?php //Starts the database connection.
require '../include/connection.php';

$stmt = $conn->prepare("SELECT * FROM `lists`");
$stmt->execute();
$result = $stmt->fetchAll();
$conn = null;
include "../include/head.php";
include "../include/navbar.php";
?>

<body>
    <div class="container">
        <h1>To-Do List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lijst</th>
                    <th scope="col">categories</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row) {
                ?>

                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['categorie'] ?></td>
                        <td class="text-right">
                            <a class="btn btn-success" href='showList.php?id=<?php echo $row['id'] ?>'>Tasks</a>
                            <a class="btn btn-warning" href='updateList.php?id=<?php echo $row['id'] ?>'>Edit</a>
                            <a class="btn btn-danger" href='deleteList.php?id=<?php echo $row['id'] ?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <div class="col-12 text-center">
            <a class="btn btn-primary text-white" href="createList.php">Nieuwe lijst aanmaken</a>
        </div>
    </div>
      <?php
           require "../include/footer.php";
       ?>
</body>

</html>