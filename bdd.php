<?php

// la fonction retourne un objet PDO
function connexion(): PDO{

// Essaie de se connecter à la base de données
// Retourne l'objet PDO si la connexion est réussie
    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=artbox;charset=utf8mb4',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
            );

            return $pdo;

    // Stoppe le script en cas d'erreur (à remplacer par un log en production)
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}