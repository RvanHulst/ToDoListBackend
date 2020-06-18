
<?php
require "../include/head.php";
?>
    <div class="container">
        <h1>Nieuwe lijst aanmaken</h1>
        <form method="POST" action='../functionality/addList.php'>
            <div class="form-group">
                <label>Lijstnaam</label>
                <input type="text" class="form-control" name="name" placeholder="Voer hier uw lijstnaam in" required>
                <label>categorie</label>
                <input type="text" class="form-control" name="categorie" placeholder="Voer hier uw categorie in" required>
            </div>
            <button type="submit" class="btn btn-primary">Lijst aanmaken</button>
        </form>
    </div>

<?php
require "../include/footer.php";
?>