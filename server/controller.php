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

function readCategoriesController() {
    return getAllCategories();
}

function readMoviesController() {
    $age = $_REQUEST['age']; 
    
    $movies = getAllMovies($age);
    $grouped = [];
    foreach ($movies as $movie) {
        $nameCat = $movie->category_name;
        
        if (!isset($grouped[$nameCat])) {
            $grouped[$nameCat] = [
                "label" => $nameCat,
                "movies" => []
            ];
        }
        $grouped[$nameCat]["movies"][] = $movie;
    }
      
    return array_values($grouped);
}

function readMovieDetailController() {
    if (empty($_REQUEST['id'])) {
        return ["status" => "error", "message" => "L'identifiant du film est manquant."];
    }
    
    $id = $_REQUEST['id'];
    
    $movie = getMovieDetail($id);
    
    if ($movie) {
        return $movie;
    } else {
        return ["status" => "error", "message" => "Film introuvable."];
    }
};

function addProfileController() {
    $id = empty($_REQUEST['id']) ? null : $_REQUEST['id']; 
    $nom = $_REQUEST['nom'];
    $avatar = $_REQUEST['avatar']; 
    $age = $_REQUEST['age'];

    $resultat = addProfile($id, $nom, $avatar, $age);

    if ($resultat != 0) {
        return "Le profil a été enregistré.";
    }
    return false;
}

function readProfilesController() {
    return getAllProfiles();
}

function readFavoritesController(){
    $profile = $_REQUEST['id_profile'];
    
    $favorites = getAllFavorite($profile);
    return $favorites;
}

function addFavoriteController(){
    $profile = $_REQUEST['id_profile'];
    $movie = $_REQUEST['id_movie'];

    $ok = addFavorite($profile, $movie);
    if($ok != 0){
        return "Film ajouté aux favoris";
    } else {
        return false;
    }
}

function removeFavoriteController(){
    $profile = $_REQUEST['id_profile'];
    $movie = $_REQUEST['id_movie'];

    $ok = removeFavorite($profile, $movie);
    if($ok != 0){
        return "Film retiré des favoris";
    } else {
        return false;
    }
}