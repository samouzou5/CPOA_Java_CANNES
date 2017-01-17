<?php
$titre = 'Connexion gestion VIP';
ob_start();
echo '<fieldset>';
echo '<legend>Page de connexion</legend>';
echo '<form method="post" action="index.php?action=verification">';
echo '<ul class="formulaire">';
echo '<li><label for="login1">Identifiant: </label><input type="text" name="login" required placeholder="Entrez votre login"> </li>';
echo '<li><label for="motdepasse"> Mot de passe: </label><input type="password" required name="mdp" placeholder="Entrez votre mot de passe"> </li>';
echo '<li> <input type="submit" name="Connexion" value="Connexion"> </li>';
echo ' </ul> </form>';
echo '</fieldset>';
$contenu= ob_get_clean();
require('Views/header.php');
require('Views/layout.php');
?>