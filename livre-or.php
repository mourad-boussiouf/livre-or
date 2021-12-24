
<?php

session_start();

if(isset($_SESSION['login'])){
    include ('loggedbar.php'); 
    echo ("<div class = livreorbutton><a href='commentaire.php'>Écrire dans le livre d'or <img src='image/plume.png' class = imgplume alt='Flowers in Chania'></a>".'</div><br>'); 
    }
    
?>

<?php
if(!isset($_SESSION['login'])){
include('header.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre d'or</title>
</head>
<body>
<div class="clear"></div>
<?php

 include('connection.php');

$display=$pdo->prepare("SELECT * from commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur=utilisateurs.id ORDER BY date DESC");

$display->execute();


while($i=$display->fetch()){
echo '<div class = comments><div class = infocomm> <p> posté par <b>'. '  '. $i['login'].' '. '</b>le'.' '. $i['date'].':'. '<br> </p></div>';
echo  '<div class = contentcomm>'.$i["commentaire"].'<br></div></div>' ;
}
?>

<footer>
<?php
include('footer.html');
?>
</footer>
</body>

</html>