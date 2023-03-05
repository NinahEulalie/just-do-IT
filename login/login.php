<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$database = "aeeni";

$connection = mysqli_connect($hostname, $username, $password, $database);
 if(!$connection) {
    die ("Connexion échouée: " . mysqli_connect_error());
 }

 //vérification
 $matricule = $_POST["matricule"];
 $mdp = $_POST["mdp"];

 $sql = "SELECT * FROM etudiant WHERE matricule = '$matricule' AND mdp = '$mdp'";
 $result = mysqli_query($connection, $sql);


 if (!$result) {
    die("Erreur lors de l'exécution de la requête: " . mysqli_error($connection));
    
 }

 if (mysqli_num_rows($result) == 1) {

    $_SESSION["matricule"] = $matricule;
    header("Location: ../HTML/index.php");
 } else {
    echo "Identifiants incorrectes";
 }

 mysqli_close($connection);

?>
