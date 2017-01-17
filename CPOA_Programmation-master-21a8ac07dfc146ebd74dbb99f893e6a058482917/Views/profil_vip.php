<?php
	$titre='Profil du VIP';
	ob_start();
	echo '<aside>Demandes';
	echo '<table> <tr> <th>Requete</th><th>Date</th><th>DeadLine</th></tr>';
			foreach ($result1 as $line){
				echo '<tr>';
				echo '<td>'.$line['requete'].'</td>';
				echo '<td>'.$line['dateDebut'].'</td>';
				echo '<td>'.$line['deadLine'].'</td>';
				
				
			}
		
	echo '</table></aside>';
	echo '<h1>Profil de '.$res2['penomVip'].'&nbsp'.$res2['nomVip'].'</h1>';
	echo '<div><img src="Web/Photo/'.$res3['photo'].'" style="width:304px;height:228px;"></div>';
	echo '<h1>Nationalité : '.$res2['nationalite'].'</h1>';
	echo '<h1>Profession : '.$res2['profession'].'</h1>';
	echo '<p> Info : '.$res2['infos'].'</p>';
	echo '<form method="post" action="index.php?action=Supprimer">';
	echo '<input type="submit" value="Supprimer">';
	echo '<input type="hidden" name="idvip" value="'.$_GET["idvip"].'">';
	echo '</form>';
	echo '<form method="post" action="index.php?action=Modifier">';
	echo '<input type="submit" value="Modifier">';
	echo '<input type="hidden" name="idvip" value="'.$_GET["idvip"].'">';
	echo '</form>';
	
	echo '<p>Commmunications récentes</p>';
	if ($result!=null){
		echo '<table> <tr> <th>Intitulé</th><th>Date</th><th>Plateforme</th><th>Contenu</th></tr>';
				foreach ($result as $ligne){
					echo '<tr>';
					echo '<td>'.$ligne['intitule'].'</td>';
					echo '<td>'.$ligne['dateEchange'].'</td>';
					echo '<td>'.$ligne['plateforme'].'</td>';
					echo '<td>'.$ligne['contenu'].'</td>';
					
				}
				echo '</table>';
	}
	$contenu=ob_get_clean();
	require("Views/header.php");
	require("Views/layout.php");
?>