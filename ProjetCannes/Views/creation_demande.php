<?php
	$titre='Création d\'une demande';
	ob_start();
	echo '<h1>Création d\'une demande</h1>';
	echo '<form method="post" action="index.php?action=insertion_demande">';
	echo '<label for="demande"> Demande: </label><input type="text" name="demande" placeholder="Entrez votre demande"><br><br><br>';
	echo '<label for="VIP concer"> VIP concerné:</label><select name="idvip">';
	
	if (isset($result1)){
		foreach($result1 as $ligne){
			echo '<option value="'.$ligne["idVip"].'">'.$ligne["nomVip"].'&nbsp'.$ligne['penomVip'].'</option>';
		}
	}
	else if (isset($result4)){
		foreach($result4 as $ligne){
			echo '<option value="'.$ligne["idVip"].'">'.$ligne["nomVip"].'&nbsp'.$ligne["penomVip"].'</option>';
		}
	}
	echo '</select>';
	echo '<br><br><br>';
	echo '<label for="Date"> Date: </label><input type="date" name="date1"><br><br><br>';
	echo '<label for="deadline"> Deadline: </label><input type="date" name="date2"><br><br><br>';

	if(isset($nope)){
		echo '<em> Veuillez saisir une deadline qui soit postérieur à la date actuel <em>';
	}

	echo '<ul style="list-style-type:none"><li>';
	echo '<input type="submit"  value="Enregistrer"></li>';
	echo '<li><input type="reset"  value="Annuler"></li>';
	echo '</ul>';
	echo '</form>';
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>
