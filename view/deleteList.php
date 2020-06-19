<?php
require "../include/connection.php";

  $stmt = $conn->prepare("SELECT * FROM lists WHERE id = :id");
  $stmt->bindParam(":id", $_GET['id']);
  $stmt->execute();
  $result = $stmt->fetch();
  $conn = NULL;

require "../include/head.php";
?>

<h2 class="display-4">Delete list</h2>
<p>Are you sure you want to delete the list <b><?php echo $result['name'] ?></b> and all of its content.</p>
<a href="../functionality/removeList.php?id=<?php echo $_GET['id'] ?>" class="btn btn-danger text-white">Delete</a>
<?php require "../include/footer.php"; ?>