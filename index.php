<?php
    require 'header.php';
    require 'bdd.php';


    $bdd = connexion();
    $query = 'SELECT * FROM `oeuvres`';
    $oeuvresStatement = $bdd->prepare($query);
    $oeuvresStatement->execute();

?>
<div id="liste-oeuvres">
    <?php while($oeuvre = $oeuvresStatement->fetch()): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endwhile; ?>
</div>
<?php require 'footer.php'; ?>
