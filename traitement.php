<?php
require 'bdd.php';


if(empty($_POST['titre']) 
|| empty($_POST['artiste']) 
|| empty($_POST['image']) 
|| empty($_POST['description'])
|| strlen($_POST['description']) < 3
|| !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
    header('location: ajouter.php?error=1');
}else{
    $bdd = connexion();
    $query = 'INSERT INTO `oeuvres` (`titre`, `artiste`, `image`, `description`) VALUES (:titre, :artiste, :image, :description)';
    $insertStatement = $bdd->prepare($query);
    $insertStatement->execute([
        'titre' => $_POST['titre'],
        'artiste' => $_POST['artiste'],
        'image' => $_POST['image'],
        'description' => $_POST['description']
    ]);

    header('location: index.php');
}