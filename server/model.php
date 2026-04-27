<?php

 
define("HOST", "localhost");
define("DBNAME", "chicoine3");
define("DBLOGIN", "chicoine3");
define("DBPWD", "chicoine3");


function getAllMovies(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.image, Movie.name, Category.name AS category_nom FROM Movie, Category WHERE Movie.id_category = Category.id";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 
}



function AddMovie($t, $r, $a, $d, $desc, $c,$n,$rest, $trail){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD); 
    $sql = "INSERT INTO Movie (name, director, year, length, description, id_category, image, min_age, trailer) 
            VALUES (:t, :r, :a, :d, :desc,:c, :n, :rest, :trail)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':t', $t);
    $stmt->bindParam(':r', $r);
    $stmt->bindParam(':a', $a);
    $stmt->bindParam(':d', $d);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':c', $c);
    $stmt->bindParam(':n', $n);
    $stmt->bindParam(':rest', $rest);
    $stmt->bindParam(':trail', $trail);


    $stmt->execute();
    $res = $stmt->rowCount(); 
    return $res; 
};

function getAllCategories() {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT id, name FROM Category";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getMovieDetail($id) {
$cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);


    $sql = "SELECT Movie.*, Category.name AS nom_categorie 
            FROM Movie 
            INNER JOIN Category ON Movie.id_category = Category.id 
            WHERE Movie.id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ); 
};

function addProfile($nom, $avatar, $age) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    
    $sql = "INSERT INTO Profile (nom, avatar, age_restriction) 
            VALUES (:nom, :avatar, :age)";
            
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':age', $age);
    
    $stmt->execute();
    return $stmt->rowCount(); 
}


