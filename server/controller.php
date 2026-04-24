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
    $trailer = $_REQUEST['trailer'];


    $resultat = addMovie($titre, $realisateur, $annee, $duree, $description, $categorie, $nomfilm, $restrictionage, $trailer);
    
   if ($resultat!=0){
    return "Le film $titre a été ajouté";
  }
  else{
    return false;
  }
}

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
}

