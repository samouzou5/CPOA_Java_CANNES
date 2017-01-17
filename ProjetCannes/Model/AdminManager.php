<?php
class AdminManager extends Model{
	public function getInfoAdmin($login,$mdp){
		$login=strtolower($login);
		$requete = 'Select count(*) from Admin where Login=? and Mdp=?';
		$user =$this->executerRequete($requete,array($login,$mdp));
		$result = $user->fetch();
		$user->closeCursor();
		return $result[0];
		}
	public function existeAdmin($login){
		$login=strtolower($login);
		$requete = 'Select count(*) from Admin where Login=?';
		$count=$this->executerRequete($requete,array($login));
		$result = $count->fetch();
		$count->closeCursor();
		return $result[0];
	}
	

}
?>