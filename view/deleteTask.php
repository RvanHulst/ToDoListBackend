<?php
require "../include/connection.php";

$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->bindParam(":id", $_GET['id']);
$stmt->execute();
$result = $stmt->fetch();
$conn = NULL;
?>
<?php require "../include/head.php"; ?>
<h2 class="display-4">Delete list</h2>
<p>Are you sure you want to delete the list <b><?php echo $result['name'] ?></b> and all of its content.</p>
<a href="../functionality/removeTask.php?id=<?php echo $_GET['id'] ?>&list_id= <?php echo $_GET['list_id'] ?>" class="btn btn-danger text-white">Delete</a>
<?php require "../include/footer.php"; ?>

