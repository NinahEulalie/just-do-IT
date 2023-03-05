<?php
session_start();

$servername = "localhost";
$username ="root";
$password ="";
$database ="aeeni";

//create the connection 
$connection = new mysqli($servername, $username, $password, $database);

$titre = "";
$question = "";
$tag = "";

$errorMessage ="";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titre = $_POST["titre"];
    $question = $_POST["question"];
    $tag = $_POST["tag"];
    
    //get matricule value from session
    $user_matricule = $_SESSION["matricule"];

    do {
        if (empty($titre) || empty($question) || empty($tag)) {
            $errorMessage = "All the fields are required";
            break;
        }

        //Get student id from DB by matricule
        $sql0 = "SELECT id FROM etudiant WHERE matricule = '$user_matricule'";
        $result0 = $connection->query($sql0);
        $row = mysqli_fetch_array($result0);
        $id = $row['id'];

        //insérer une nouvelle question dans la BD
        $sql = "INSERT INTO questions (titre, question, tag, id_et) VALUES ('$titre', '$question', '$tag', '$id')";
        $result = $connection->query($sql); //execute the sql query
        if(!$result) {
            $errorMessage = "Requête invalide: " . $connection->error;
            break;
        }

        $titre = "";
        $question = "";
        $tag = "";

        $successMessage = "Publiée!";
    
        
    } while (false);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test website</title>

    <!--cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--css link-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--header starts-->
    <header>
        <a href="#" class="logo"><i class="fa-regular fa-arrow-right-arrow-left"></i>Echange.</a>
        <nav class="navbar-left">

            <ul>
                <li><a href="#home">Accueil</a></li>
                <li><a class="active" href="#question">Questions</a></li>
                <li><a href="#dishes">tags</a></li>
                <li><a href="#about">users</a></li>
            </ul>
            
        </nav>

        <div class="navbar-center">
            <button type="submit"><i class="fas fa-search" id="search-icon"></i></button>
            <input type="text" id="mon_input" name="mon_input" placeholder="recherchez:">
        </div>

        <div class="navbar-right">
            <ul>
                <li><a href="#" class="fa-solid fa-user"></a></li>
                <span style="margin-top: 10px;"><?php echo $_SESSION["matricule"] ; ?></span>
                <li><a href="../logout.php" class="fa-solid fa-power-off"></a></li>
            </ul>
            
        </div>
    </header>
    <!--header ends-->

    <!-- réponse -->
    <div class="reponse">
        <form method="post">
          <label for="titre">Titre :</label>
          <input type="text" id="titre" name="titre" required>
          <label for="question">Contenu :</label>
          <textarea id="question" name="question" placeholder="posez votre question ici :" required></textarea>
            <div class="file-upload">
                <label for="upload" class="fichier">
                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.5 14h-1.75v3.25C16.75 17.85 15.6 19 14.25 19h-4.5C9.4 19 8.25 17.85 8.25 16.5V14H6v-2.25C6 10.65 7.15 9.5 8.5 9.5h7c1.35 0 2.5 1.15 2.5 2.5V14zm-6.25 1.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm6.25-6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM12 3c3.1 0 5.5 2.4 5.5 5.5H20c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2v-8c0-1.1.9-2 2-2h2.5C6.5 5.4 8.9 3 12 3z"/>
                    </svg>
                    <span>Ajouter un fichier</span>
                </label>
                <input type="file" id="upload" name="upload">
            </div>
            <input type="text" id="tag" name="tag" placeholder="votre tag ici :">
          <input type="submit" value="Publier">
        </form>
    </div>
    <!-- réponse end -->

    <!-- messages  -->
     <?php
            if ( !empty($errorMessage) ){
                echo "
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>   

    <?php
                if (!empty($successMessage)) {
                    echo "
                    <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-3'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong> $successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                    </div>
                    ";
                }
    ?>


    <div class="container">

    <?php 
    $sql1 = "SELECT questions.*, etudiant.nom_complet FROM questions, etudiant WHERE questions.id_et = etudiant.id ORDER BY questions.id DESC";
    $result1 = $connection->query($sql1);

    if (!$result1) {
        die ("Invalid query: ".$connection->error);
    }
    ?>
        
    <?php
    while ($row = $result1->fetch_assoc()) {
    echo "
    <div class='post'>
    <h2>$row[titre]</h2>
    <div class='meta'>Posté par $row[nom_complet], le $row[date_envoi]</div>
    <p>$row[question]</p>
    <br>
    <a href='#about'>réponse</a>
    </div>
    ";
    }
    ?>
            
            
    </div>


<!--file link js-->
<script src="script.js"></script>
<script src="recherche.js"></script>
</body>
</html>