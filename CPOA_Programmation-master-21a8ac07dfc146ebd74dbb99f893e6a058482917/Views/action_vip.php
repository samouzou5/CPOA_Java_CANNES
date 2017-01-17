<?php
$titre='Modifier action';
ob_start();
echo '<h1>Création d\'une action</h1>';
echo '<form method="post" action="index.php?action=update_action">';
echo '<label for id="action1">Action :</label><input type="text" name="intitule_act" id="action1"><br><br><br>';
echo '<label for id="get_status">Statut : </label><select name="statut_act">
<option>Commencé</option>
<option>En cours</option>
<option>Suspendu</option>
<option>Fini</option>
</select><br><br><br>';
echo '<label for id="date_act">Date :<input type="date" id="date_act" name="date_act">';
echo '<ul style="list-style-type:none"><li>';
echo '<input type="hidden" name="id" value='.$_GET["idaction"].'>';
echo '<input type="submit" name="valid3" value="Enregistrer"></li><br>';
echo '<li><input type="reset" name="back3" value="Annuler"></li>';
echo '</ul>';
echo '</form>';
$contenu=ob_get_clean();
require("Views/header.php");
require("Views/layout.php");