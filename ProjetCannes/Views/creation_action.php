<?php

	$titre='Cr�er une action';
	ob_start();
	echo '<h1>Cr�ation d\'une action</h1>';
	echo '<p> '.$info["penomVip"].' '.$info["nomVip"].' a demand�: '.$info["requete"].' (� faire avant le '.$info["deadLine"].')</p>'; 
	echo '<form method="post" action="index.php?action=creation_action">';
	echo '<label for id="action1">Action :</label><input type="text" name="nomA" id="action1"><br><br><br>';
	echo '<label for id="get_status">Statut : </label><select name="statutA">
			<option value="A faire">A faire</option>
			<option value="En cours">En cours</option>
			<option value="Suspendu">Suspendu</option>
			<option value="Fini">Fini</option>
			</select><br><br><br>';
	echo '<label for id="date_act">Date :<input type="date" id="date_act" name="dateA">';
	echo '<ul style="list-style-type:none"><li>';
	echo '<input type="hidden" name="idDemande" value='.$info["idDemande"].'>';
	echo '<input type="submit" value="Enregistrer"></li><br>';
	echo '<li><input type="reset" value="Annuler"></li>';
	echo '</ul>';
	echo '</form>';
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");

?>