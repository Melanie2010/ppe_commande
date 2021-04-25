<?php

session_start();

//ouvrir la base de donnée 
$bdd = new PDO('mysql:host=localhost;dbname=ppe_commande','root','');
$bdd->exec("SET CHARACTER SET utf8");

//requete d insertion 
$pdoStat = $bdd->prepare('INSERT INTO data_commande (id_commande, nb_tablettes, nb_pc, nb_portables, adresse) VALUES(null, :nb_tablettes, :nb_pc, :nb_portables, :adresse)');
 
//chaque marqueur a une valeur
$pdoStat->bindValue(':nb_tablettes', $_POST['tablettes'], PDO::PARAM_INT); 
$pdoStat->bindValue(':nb_pc', $_POST['pc'], PDO::PARAM_INT); 
$pdoStat->bindValue(':nb_portables', $_POST['portable'], PDO::PARAM_INT);
$pdoStat->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);

//executer la requete
$insertIsOk = $pdoStat->execute();

if ($insertIsOk) {
    $message = 'La commande a été ajouté.';
} else {
    $message = 'Echec de l insertion';
}

//Création de variables pour compter le total de tous les produits 
$nb_tablettes = $_POST['tablettes'];
$nb_pc = $_POST['pc'];
$nb_portable = $_POST['portable'];
$nb_produits = $nb_tablettes + $nb_pc + $nb_portable; 

//Création de variables pour calculer le prix total
$prix_tablettes = 350;  //prix d'une tablette
$prix_pc = 700; // prix d'un pc
$prix_portable = 1000; // prix d'un portable
$prix_total = $nb_tablettes*$prix_tablettes + $nb_pc*$prix_pc + $nb_portable*$prix_portable; 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Technos Prod</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <header>
    <h1>Technos Prod</h1>
    <h2>Voici le résultat de votre commande</h2>
  </header>
<section>
    <h2> Votre commande du <?php print date('j/m/Y') ?>, <?php print date("H:i") ?> </h2>  <!-- Affiche l'heure et la date -->
    <h3>Détail de votre commande:</h3>
    <p>Nombre de produits : <?php echo($nb_produits); ?></br></br> <!--Récupère la variable créer à la ligne31-->
      <?php echo($_POST['tablettes'])?> : Tablettes </br>
      <?php echo($_POST['pc'])?> : PC</br>
      <?php echo($_POST['portable'])?> : Portables
    </p>
    <ul>Le total de votre commande est de : <?php echo($prix_total); ?> € </ul> <!--Récupère la variable créer à la ligne37--><!-- Touche Alt Gr + e pour le symbole euro -->
    <p>Adresse : <?php echo($_POST['adresse'])?> </p>
</section>
</body>
</html>

