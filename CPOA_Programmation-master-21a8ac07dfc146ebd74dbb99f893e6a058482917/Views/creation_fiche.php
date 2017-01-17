<?php
	$titre='Création fiche VIP';
	ob_start();
	echo '<form method="post" action="index.php?action=creation">';
	echo '<h1>Création d\'une fiche VIP</h1>';
	echo '<ul class="formulaire1">';
	echo '<div id="part1"><li><label for="nom">Nom: </label><input type="text" name="nom" placeholder="Nom"> </li>';
	echo '<li><label for="prenom"> Prénom: </label><input type="text" name="prenom" placeholder="Entrez votre prénom"> </li>';
	echo '<li><label for="surnom"> Surnom: </label><input type="text" name="surnom" placeholder="Surnom"></li>';
	echo '<li><label for="comp"> Statut:</label><select name="select" required="required">
	<option value="Marié">Marié</option>
		<option value="Celibataire">Celibataire</option></select></li>';
	echo '<li><label for="Importe"> Importance:</label><select name="import" required="required">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>	
	<option value="4">4</option>		
	<option value="5">5</option>	
	<option value="6">6</option>	
	<option value="7">7</option>	
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option></select></li>';	
	echo '<li><label for="Importe"> Nbr enfants:</label><select name="enf" required="required">
	<option value="0">0</option>
	<option value="1">1</option>	
	<option value="2">2</option>	
	<option value="3">3</option></select></li>';	
	echo '<li><label for="date_naiss"> Date de naissance:</label><input type="date" name="date_n"></li>';
	echo '<li><label for="sexe">Sexe:</label><INPUT type= "radio" name="sexe" value="M">M<br>
								<INPUT type= "radio" name="sexe" value="F">F<br></li></div>';
	echo '<div id="part2"><li><label for="ajout_photo"> Ajout de photo: </label><input type="file" name="photo"></li>';
	echo '<li><label for="nationalite">Nationalité: </label><input type="text" name="nation" placeholder="Nationalité"> </li>';
	echo '<li><label for="profession">Profession: </label><input type="text" name="profession" placeholder="profession"> </li>';
	echo '<li><label for="lieu_r">Lieu de résidence: </label><input type="text" name="lieu_r" placeholder="Lieu"> </li>';
	echo '<li><label for="infos">Informations: </label><textarea name="infos" cols="20" rows="4" placeholder="Entrez..."></textarea> </li></div>';
	echo '<li><ul id="fin"><li><input type="submit" value="Enregistrer"></li>';
	echo '<li><input type="reset" value="Annuler"></li></ul></li>';
	echo '</form>';
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>