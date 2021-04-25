<?php
session_start();

//ouvrir la base de donnée 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=ppe_commande', 'root', '');
$bdd->exec("SET CHARACTER SET utf8");

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
    <h2>Formulaire de commande</h2>
  </header>
<main>
  <form action="validation_commande.php" method="post">
    <table>
      <thead>
        <tr>
          <th>Produits</th>
          <th>Quantité</th>
        </tr>
      </thead>
      <tr>
        <td><label for="tablettes">Tablettes</label></td>
        <td><input type="number" min="1" max="10" name="tablettes" id="tablettes" placeholder="0" autofocus required></td>
      </tr>
      <tr>
        <td><label for="pc">Pc</label></td>
        <td><input type="number" min="1" max="10" name="pc"  id="pc" placeholder="0" required></td>
      </tr>
      <tr>
        <td><label for="portable">Portable</label></td>
        <td><input type="number" min="1" max="10" name="portable" id="portable" placeholder="0" required></td>
      </tr>
      <tr>
        <td><label for="adresse">Adresse</label></td>
        <td><input type="text" name="adresse" id="adresse" placeholder="Adresse" required></td>
      </tr>
      <tfoot>
        <tr>
          <td colspan=2><input type=submit name="send" value="Envoyer la commande"></td>
        </tr>
    </tfoot>
    </table>
  </form> 
 
</main>

</body>
</html>

