<?php

session_start();
@$login=$_POST["login"];
@$password=$_POST["password"];
@$valider=$_POST["valider"];
$message = "";
if(isset($valider)) {
    include("connection.php");
    $res=$pdo->prepare ("SELECT * from utilisateurs where login = ? and password = ? limit 1");
    $res->setFetchMode(PDO::FETCH_ASSOC);
    $res->execute(array($login, md5($password)));
    $tab=$res->fetchAll();
    if (count($tab) == 0)
    $message="<li>Mauvais login ou mot de passe </li>";
    else {
        $_SESSION ["autoriser"] = "oui";
        $_SESSION ["login"]=strtoupper($tab [0]["login"]);
        header("location:profil.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href = "style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
</head>

<body onLoad="document.fo.login.focus()">
<form name ="loginform" method = "POST" action = "#" enctype = "multipart/form-data">
    <div class ="label"> Login </div>
    <input type = "text" name="login" value = Login />           
    <div class = "label"> Mot de passe </div>
    <input type = "password" name ="password" value = "Mot de passe" /> <br>
    <input type = "submit" name = "valider" value = "Se connecter" />
    <p>Pas de compte ?</p><a href = "inscription.php"> S'inscrire </a>
</form>
</body>
</html>