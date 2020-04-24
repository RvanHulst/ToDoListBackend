
<?php //Starts the database connection.
include __DIR__ . '\include\head.php';
require "include/navbar.php";


$stmt = $conn->prepare("SELECT * FROM `lists`");
$stmt->execute();
$result = $stmt->fetchAll();
$conn = null;
?>

<body>
    <div class="container">
        <h1>To-Do List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Lijst</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($result as $row) {
                ?>

                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td class="text-right">
                            <a class="btn btn-success" href='include/showList.php?id=<?php echo $row['id'] ?>'>Tasks</a>
                            <a class="btn btn-warning" href=' include/updateList.php?id=<?php echo $row['id'] ?>'>Edit</a>
                            <a class="btn btn-danger" href=' include/deletelist.php?id=<?php echo $row['id'] ?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                </tr>
            </tbody>
        </table>
        <div class="col-12 text-center">
            <a class="btn btn-primary text-white" href="include/createList.php">Nieuwe lijst aanmaken</a>
        </div>
    </div>
      <?php
           require "include/footer.php";
       ?>
</body>

</html>