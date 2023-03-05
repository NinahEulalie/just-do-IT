

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>

    <!-- css link -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="izy-rehetra">
        <div class="sign_up">
            <div class="card1">
                <p>Bonjour, <br> connectez-vous!</p>
                <div class="logo">
                    <img src="" alt="">
                </div>
            </div>

            <form method="post" action="login.php">
                <div class="card2">
                    <div class="info">
                        <input type="text" id="matricule" name="matricule" class="input" placeholder="N° matricule" required >
                        <input type="text" id="nom" name="nom" class="input" placeholder="Nom et prénom(s)" required>
                        <input type="text" id="email" name="email" class="input" placeholder="Email" required>
                        <input type="password" id="mdp" name="mdp" class="input" placeholder="Mot de passe" required>
                    </div>
                </div>

                <div class="boutton" > 
                    <button type="submit" name="submit" value="Se connecter" class="submit-btn" >Se connecter</button>
                </div>
               
                
            </form>
        </div>

        
         
    </div>

    



</body>

</html>