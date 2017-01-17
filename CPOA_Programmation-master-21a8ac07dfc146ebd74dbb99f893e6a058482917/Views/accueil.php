<?php
	$titre='Accueil';
	ob_start();
	echo '<p><section class="gauche">';
	echo '<table><tr><th colspan=2><h2>Vip Récents</h2></th></tr><tr><th>Vip</th><th>Profession</th></tr>';
	foreach($newvip as $ligne){
		echo '<tr><td>'.$ligne["penomVip"].' '.$ligne["nomVip"].'</td><td>'.$ligne["profession"].'</td></tr>';
	}
	echo '</table></section></p>';
	
	echo '<aside>';
	echo '<table><tr><th colspan=3><h2>Demandes en attentes</h2></th></tr>
				<tr> <th>Vip</th><th>Demande</th><th>Dead Line</th> <tr>';		
	foreach($demandes as $l){
		echo '<tr><td>'.$l["penomVip"].' '.$l["nomVip"].'</td><td>'.$l["requete"].'</td><td>'.$l["deadLine"].'</td></tr>';
	}
	echo '</table></aside>';
	
	echo '<p>';
	echo '<section class="gauche1">Communications récentes';
	echo '<table> <tr><th colspan=3><h2>Communication récentes</h2><th></tr>';
	foreach($newEch as $row){
		echo '<tr> <td>'.$row["penomVip"].' '.$row["nomVip"].'</td><td>'.$row["intitule"].'</td><td>'.$row["contenu"].'</td><td>'.$row["dateEchange"].'</td></tr>';
	}
	echo '</table>';
	echo '</section>';
	echo '</p>';
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>