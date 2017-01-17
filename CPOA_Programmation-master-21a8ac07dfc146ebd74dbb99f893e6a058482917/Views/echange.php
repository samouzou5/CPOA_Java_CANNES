<?php
	$titre='Echange VIP';
	ob_start();
	
	echo '<h1>Création d\'un échange</h1>';
	echo '<form method="post" action="index.php?action=ajout_echange&idvip='.$_GET["idvip"].'">';
	echo '<label for="id_lab">Saisissez le moyen de communication: </label>
			<select name="comm" id="id_lab"><option value="Téléphone">Téléphone</option>
								<option value="SMS">SMS</option>
								<option value="Réseau Social">Réseau social</option>
								<option value="Mail">Mail</option>
								<option value="Courrier">Courrier</option>';
	echo '</select><br><br><br>';
	
	echo '<label for="VIP concer"> VIP concerné:</label><select name="idvip">';
	foreach($result4 as $ligne){
		echo '<option value="'.$ligne["idVip"].'">'.$ligne["nomVip"].'&nbsp'.$ligne["penomVip"].'</option>';
	}
	echo '</select><br><br><br>';
	
	echo '<label for="id2">Date : </label><input type="date" name="date_ech" id="id2"><br><br><br>';
	
	echo '<label for="id3">Intitulé: </label><input type="text" name="nom1" id="id3"><br><br><br>';
	
	echo '<label for="id4">Contenu de l\'échange:</label><textarea name="champ_text" id="id4"></textarea>';
	echo '<ul style="list-style-type:none">';
	echo '<li><input type="submit" value="Enregistrer"></li>';
	echo '<li><input type="reset" name="back2" value="Annuler"></li>';
	echo '<input type="hidden" value='.$_GET["idvip"].' name="g" />';
	echo '</ul>';
	echo '</form>';
	
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>