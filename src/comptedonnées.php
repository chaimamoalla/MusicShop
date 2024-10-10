<!DOCTYPE html>
<html>
<head>
    <title>Page de récupération des variables</title>
</head>
<body>
    
<?php
//login
if(isset($_POST['email']) && isset($_POST['psw'])) {
    $email = $_POST['email'];
    $password = $_POST['psw'];
    echo "voici les données : <br> l'email <b>$email</b> <br> ";
    echo "son password est <b>$password </b><br>";
}

//new account
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['tel'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    echo "son nom est <b>$nom</b><br> son prenom est <b>$prenom</b><br> son telephone est <b>$tel</b>";
}
?>
</body>
</html>
