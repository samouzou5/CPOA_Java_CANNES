<?php
$titre='Création d\'une demande VIP';
ob_start();
echo '<h1>Création d\'une demande</h1>';
echo '<form method="post" action="index.php?action="creation_demande1">';
echo '<label for="demande"> Demande: </label><input type="text" name="demande" placeholder="Entrez votre demande"><br><br><br>';
echo '<label for="VIP concer"> VIP concerné:</label><select>';
foreach($result4 as $ligne){
	echo '<option>'.$ligne["nomVip"].'&nbsp'.$ligne["penomVip"].'</option>';
}
echo '</select>';
echo '<br><br><br>';
echo '<label for="Date"> Date: </label><input type="date" name="deb"><br><br><br>';
echo '<label for="deadline"> Deadline: </label><input type="date" name="date_fin"><br><br><br>';
echo '<ul style="list-style-type:none">';
echo '<li><input type="submit" name="valid1" value="Enregistrer"></li>';
echo '<li><input type="reset" name="back1" value="Annuler"></li>';
echo '<input type="hidden" value='.$_GET["idvip"].' name="f" />';
echo '</ul>';
echo '</form>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");
?>
