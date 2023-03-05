<?php
// Ouvrir la session
session_start();

// Vider la session
session_unset();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion
header("Location: home.php");
exit();
?>
