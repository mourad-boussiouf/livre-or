<?php
session_start();

@$login=$_POST["login"];
@$password= $_POST["password"];
@$passwordconfirm=$_POST['passwordconfirm'];
@$changepassword=$_POST['changepassword'];
@$changelogin=$_POST['changelogin'];
@$id = $_SESSION['id'];
@$comment=$_POST['comment'];
@$addcomment=$_POST['addcomment'];
$message="";

include("connection.php");

if(isset($_SESSION['login'])){
    include ('loggedbar.php');

    $getuser=$pdo->prepare("SELECT * from utilisateurs WHERE id = $id ");
    $getuser->execute();
    $resultuser = $getuser->fetch();
    $id_utilisateur = $resultuser['id'] ;
    }

if(isset($addcomment)){
    if(empty($comment)){ $message="<div class= messagered> Vous devez entrer un commentaire</div>";
    echo($message);}
    if(empty($message)){
        include("connection.php");
        if(strlen($comment)<20 || strlen($comment)>400){
            $message="<div class= messagered>La longueur du commentaire doit être comprise entre 20 et 400 caractères</div>";
            echo ($message);}
        else{
            $ins=$pdo->prepare("INSERT into commentaires (commentaire, id_utilisateur, date) VALUES (?,?,NOW())");
            $ins->execute(array($comment,$id_utilisateur));
            $message="<div class= messagegreen>Votre message est bien enrengistré, vous allez être redirigé vers le livre d'or.</div>";
        header("Refresh:4; url=livre-or.php");
        echo ($message);
        }
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class =postcomment>
<form name ="addcommentform" method = "POST" action = "#" enctype = "multipart/form-data">
<div class = commentbox><input type = "text" name ="comment" value = "" placeholder = "Écrivez votre message dans le livre d'or" />      <br> </div>
<div class = commentbutton><input type = "submit" name = "addcomment" value = "Ajouter le message au livre d'or" /></div>
<form>
</div>
</body>
</html>