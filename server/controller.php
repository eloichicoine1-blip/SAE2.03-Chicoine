<?php



require("model.php");


function addMoviesController() {
    if (empty($_REQUEST['titre']) || empty($_REQUEST['realisateur'])) {
        return ["status" => "error", "message" => "Le titre et le réalisateur sont obligatoires."];
    }
    
    $titre = $_REQUEST['titre'];
    $realisateur = $_REQUEST['realisateur'];
    $annee = $_REQUEST['annee'];
    $duree = $_REQUEST['duree'];
    $description = $_REQUEST['description'];
    $categorie = $_REQUEST['categorie'];
    $nomfilm = $_REQUEST['nomfilm'];
    $restrictionage = $_REQUEST['restrictionage'];

    $resultat = addMovie($titre, $realisateur, $annee, $duree, $description, $categorie, $nomfilm, $restrictionage);
    
    if ($resultat) {
        return ["status" => "success", "message" => "Le film '$titre' a été ajouté avec succès."];
    } else {
        return ["status" => "error", "message" => "Erreur lors de l'ajout dans la base de données."];
    }
}

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
}

