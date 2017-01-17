<?php
class ActionManager extends Model{
	public function Actions(){
		$requete = 'Select idAction,Actions.idDemande,requete,nomAction,statut,dateAction from Actions,Demande where Actions.idDemande=Demande.idDemande';
		$vip = $this->executerRequete($requete);
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		$vip->closeCursor();
		return $result;
	}
	public function UpdateAction($nom,$staut,$date,$idaction){
		$requete='update Actions set nomAction=?,statut=?,dateAction=? where idaction=?';
		$action=$this->executerRequete($requete,array($nom,$staut,$date,$idaction));
	}
}