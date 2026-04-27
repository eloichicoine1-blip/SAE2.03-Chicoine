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

function readMoviesController(){
    $movies = getAllMovies();
    $grp=[];
    foreach($movies as $film){
        $container = $film -> category_nom;
        if(!isset($grp[$container])){
            $grp[$container] = [];
        }
        $grp[$container][] = $film;
    }
    return $grp;
};

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
    if (empty($_REQUEST['nom'])) {
        return ["status" => "error", "message" => "Le nom du profil est obligatoire."];
    }

    $nom = $_REQUEST['nom'];
    $avatar = $_REQUEST['avatar'] ?? ""; 
    $age = $_REQUEST['age'];

    $resultat = addProfile($nom, $avatar, $age);

    if ($resultat != 0) {
        return "Le profil a été ajouté avec succès.";
    } else {
        return false;
    }
};

