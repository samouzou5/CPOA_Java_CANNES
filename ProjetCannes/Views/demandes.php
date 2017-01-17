<?php
	$titre='Liste des demandes';
	echo '<a href="index.php?action=creation_demande"><input type="submit" value="Création d\'une demande"></a>';
	echo '<form method="post" action="index.php?action=recherche_demande">';
	echo '<input type="search" name="search1" placeholder="Recherche par demande">';
	echo '</form>';
	echo '<table> <tr> <th>Intitulé</th><th>VIP</th><th>DeadLine</th><th>Action entreprise</th><th>Action</th></tr>';
			foreach ($result as $line){
				echo '<tr>';
				echo '<td>'.$line['requete'].'</td>';
				echo '<td>'.$line['nomVip'].'&nbsp'.$line['penomVip'].'</td>';
				echo '<td>'.$line['deadLine'].'</td>';
				echo '<td>Oui</td>';
				echo '<td><a href=index.php?action=agir&idDemande='.$line["idDemande"].'>Créer une action</a><br>
							<a href=index.php?action=actions&idDemande='.$line["idDemande"].'>Voir actions en lien </a> </td>';
			}
			echo '</table>';
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>
