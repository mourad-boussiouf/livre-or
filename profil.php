<?php
session_start();
if($_SESSION ["autoriser"]!="oui") {
    header("location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href = "style.css" />
    <title>Profil</title>
</head>
<body>
<h1>
    Bonjour 
<span>
<?php echo ($_SESSION["login"]); ?>
</span>
</h1>
</body>
</html>