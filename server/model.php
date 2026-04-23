<?php

 
define("HOST", "localhost");
define("DBNAME", "chicoine3");
define("DBLOGIN", "chicoine3");
define("DBPWD", "chicoine3");


function getAllMovies(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "select id, name image from Movie";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 
}



function AddMovie($t, $r, $a, $d, $desc, $c,$n,$rest){
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
}
