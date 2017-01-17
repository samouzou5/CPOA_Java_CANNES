<?php
$titre='Liste des actions';
ob_start();
echo '<table> <tr><th>Action</th><th>Demande reférence</th><th>Statut</th><th>Action</th><th>Date</th></tr>';
			foreach ($result as $ligne){
				echo '<tr>';
				echo '<td>'.$ligne['nomAction'].'</td>';
				echo '<td><a href=index.php?action=carac&idaction='.$ligne['idDemande'].'>'.$ligne['requete'].'</td>';
				echo '<td>'.$ligne['statut'].'</td>';
				echo '<td><a href=index.php?action=traiter&idaction='.$ligne['idAction'].'>Modifier</a></td>';
				echo '<td>'.$ligne['dateAction'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");