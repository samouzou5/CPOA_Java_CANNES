<?php
$titre='Création d\'une demande';
ob_start();
echo '<h1>Création d\'une demande</h1>';
echo '<form method="post" action="index.php?action="creation_demande">';
echo '<label for="demande"> Demande: </label><input type="text" name="demande1" placeholder="Entrez votre demande"><br><br><br>';
echo '<label for="VIP concer"> VIP concerné:</label><select name="selecteur">';
foreach($result1 as $ligne){
	echo '<option>'.$ligne["nomVip"].'&nbsp'.$ligne['penomVip'].'</option>';
}
echo '</select>';
echo '<br><br><br>';
echo '<label for="Date"> Date: </label><input type="date" name="date1"><br><br><br>';
echo '<label for="deadline"> Deadline: </label><input type="date" name="date2"><br><br><br>';
echo '<ul style="list-style-type:none"><li>';
echo '<input type="submit" name="valid2" value="Enregistrer"></li>';
echo '<li><input type="reset" name="back" value="Annuler"></li>';
echo '</ul>';
echo '</form>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");
?>
