<?php
    try{
        $pdo=new PDO ("mysql:host=localhost;dbname=mourad-boussiouf_livreor", "mouilaplate", "chevremiel123?");
    }
    catch(PDOException $e) {
        echo $e->getmessage();
    }
?>

