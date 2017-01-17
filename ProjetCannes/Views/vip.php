<?php
$titre='VIP';
ob_start();
echo '<br>';
echo '<form method="post" action="index.php?action=creation_fiche">';
echo '<input type="submit" value="Création d\'une fiche VIP">';
echo '</form>';
echo'<form method="post" action="index.php?action=recherche_vip">';
echo '<input type="search" name="rech_vip" placeholder="rechercher un vip par nom">';
echo '</form>';
echo '<table> <tr> <th>Nom</th><th>Prenom</th><th>Profession</th><th> Fiche</th><th>Actions</th></tr>';
			foreach ($result as $ligne){
				echo '<tr>';
				echo '<td>'.$ligne['nomVip'].'</td>';
				echo '<td>'.$ligne['penomVip'].'</td>';
				echo '<td>'.$ligne['profession'].'</td>';
				echo '<td> <a href=index.php?idvip='.$ligne['idVip'].'>voir </td>';
				echo '<td> <a href=index.php?idvip='.$ligne['idVip'].'&action=echange>Ajouter echange <br> 
						   <a href=index.php?idvip='.$ligne['idVip'].'&action=demander> Ajouter demande </td>';
				echo '</tr>';
			}
			echo '</table>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");
?>