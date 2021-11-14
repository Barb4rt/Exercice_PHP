<?php
    require('./gabarits/header.php')
?>  
        <h1>Calcul de moyenne</h1>
        <form method="get" action="formulaire.php">
            <label for="nombreEleves">Entrez le nombres d'élèves</label>
            <input type="number" name="nombreEleves" min="1" max="25" required>
            <label for="nombreNotes">Entrez le nombres de notes</label>
            <input type="number" name="nombreNotes" min="1" max="10" required>
            <input type="submit" value="Valider">
        </form>
<?php
require('./gabarits/footer.php')
?>