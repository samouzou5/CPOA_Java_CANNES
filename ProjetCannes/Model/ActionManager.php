<?php
class ActionManager extends Model{
	public function Actions(){
		$requete = 'Select idAction,nomAction,statut,dateAction,nomVip,penomVip,requete from Actions,Demande,Vip where Actions.idDemande=Demande.idDemande and Demande.idVip=Vip.idVip';
		$vip = $this->executerRequete($requete);
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		$vip->closeCursor();
		return $result;
	}
	public function UpdateAction($statut,$idaction){
		$requete='update Actions set statut=? where idaction=?';
		$action=$this->executerRequete($requete,array($statut,$idaction));
	}
	
	public function ActionsDemande($idDemande){
		$requete = 'Select idAction,nomAction,statut,dateAction,nomVip,penomVip,requete from Actions,Demande,Vip where Actions.idDemande=Demande.idDemande and Demande.idVip=Vip.idVip and Actions.idDemande=?';
		$action = $this->executerRequete($requete,array($idDemande));
		$result = $action->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	public function AjouterAction($idDemande,$nom,$statut,$date){
		$requete = 'Insert into Actions values ("",?,?,?,?)';
		$this->executerRequete($requete,array($idDemande,$nom,$statut,$date));
	}
}

?>