<?php 
    require "include/connection.php";
	require "include/navbar.php";
 ?>
    <!DOCTYPE html>
 <html>
 <?php 
 require "include/head.php";
 ?>
 <body>
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
                    <tr>
                        <td><?php echo $row['list_name'] ?></td>
                        <td class="text-right">
                            <a class="btn btn-success" href=''>
                            </a>
                            <a class="btn btn-warning" href=''>
                            </a>
                            <a class="btn btn-danger" href=''>
                            </a>
                        </td>
                    </tr>
                <tr>
                </tr>
            </tbody>
        </table>
        <div class="col-12 text-center">
            <a class="btn btn-primary text-white" href="php/createList.php">Nieuwe lijst aanmaken</a>
        </div>
    </div>
    <?php
    require "include/footer.php";
    ?>
</body>
</html>
