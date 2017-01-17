<?php
	ob_start();
	echo '<center><h1>Gestion des VIP</h1></center>';
	echo '<center>Festival de Cannes</center>';
	if(isset($_SESSION["login"])){
		echo '<nav>';
				echo '<ul>';
				echo '<li><a style="text-decoration:none" href=index.php?action=accueil> Accueil </a></li>';
                echo '<li><a style="text-decoration:none" href=index.php?action=listeVIP> VIP </a></li>';
                echo '<li><a  style="text-decoration:none" href=index.php?action=actions> Action </a></li>';
                echo '<li><a style="text-decoration:none" href=index.php?action=demandes> Demande </a></li>';
				echo '<li><a style="text-decoration:none" href=index.php?action=deconnexion> Déconnexion </a></li>';
				echo '</ul>';
		echo '</nav>';
	}
	
	$header = ob_get_clean();
?>