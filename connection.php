<?php
    try{
        $pdo=new PDO ("mysql:host=localhost;dbname=livreor", "root", "");
    }
    catch(PDOException $e) {
        echo $e->getmessage();
    }
?>

