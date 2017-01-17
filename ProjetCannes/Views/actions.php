<?php
$titre='Liste des actions';
ob_start();
echo '<table> <tr><th>Action</th><th>Demande concerné</th><th>Vip concerné</th><th>Statut</th><th>Modifier</th><th>Date</th></tr>';
			foreach ($result as $ligne){
				echo '<tr>';
				echo '<td>'.$ligne['nomAction'].'</td>';
				echo '<td>'.$ligne["requete"].'</td>';
				echo '<td>'.$ligne["penomVip"].' '.$ligne["nomVip"].'</td>';
				echo '<td>'.$ligne['statut'].'</td>';
				if ($ligne["statut"]=="Fini"){
					echo '<td> Indisponible </td>';
				}
				else{
					echo '<td> <form method="post" action="index.php?action=majAction">
									<select name="statut">
										<option value="A faire"> A faire </option>
										<option value="En cours"> En cours </option>
										<option value="Suspendu"> Suspendu </option>
										<option value="Fini"> Fini </option>
									</select>
									<input type="hidden" name="idAction" value="'.$ligne["idAction"].'">
									<input type="submit" value="Valider">
								</form>
						</td>';
				}
				echo '<td>'.$ligne['dateAction'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");