<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('config.php');
if (isset($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])){
  // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($conn, $username); 
  // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($conn, $email);
  // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($conn, $password);
  //requéte SQL + mot de passe crypté
    $query = "INSERT into `users` (username, email, password)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";
  // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
       </div>";
    }
}else{
?>
<form class="box" action="" method="post">
<h1>Bienvenue au poney fringant</h1>
    <h2 class="box-title">Inscription</h2>
  <input type="text" class="box-input" name="username" placeholder="Numéro d'adhérent" required />
    <input type="email" class="box-input" name="email" placeholder="Email" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="text" class="box-input" name="prénom" placeholder="prénom" required />
    <input type="text" class="box-input" name="nom" placeholder="nom" required />
    <input type="tel" class="box-input" name="numéro" placeholder="numéro" required />
    <input type="text" class="box-input" name="adresse" placeholder="adresse" required />
    <input type="text" class="box-input" name="code postale" placeholder="code postale" required />
    <input type="text" class="box-input" name="ville" placeholder="ville" required />
    <input type="date" class="box-input" name="date d'adhésion" placeholder="date d'adhésion" required />
    <p>
       <label for="centre d'intérêt">centre d'intérêt</label><br />
       <select name="centre d'intérêt" id="centre d'intérêt">
           <option value="sport">sport</option>
           <option value="musique">musique</option>
           <option value="jeux vidéos">jeux vidéos</option>
           <option value="lecture">lecture</option>
           <option value="informatique">informatique</option>
           <option value="sorties">sorties</option>
           <option value="cusine">cuisine</option>
           <option value="aviation">aviation</option>
           <option value="mécanique">mécanique</option>
           <option value="licornes">licornes</option>
           <option value="joaillerie">joaillerie</option>
           <option value="agriculture">agriculture</option>
           <option value="cinéma">cinéma</option>
           <option value="politique">politique</option>
           <option value="couture">couture</option>
           <option value="animaux">animaux</option>
           <option value="science">science</option>
           <option value="histoire">histoire</option>
           <option value="SVT">svt</option>
           <option value="physique-chimie">physique-chimie</option>
           <option value="taxidermie">taxidermie</option>
           <option value="philatérie">philatérie</option>
       </select>
   </p>
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <form method="post" action="traitement.php">
  

    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>