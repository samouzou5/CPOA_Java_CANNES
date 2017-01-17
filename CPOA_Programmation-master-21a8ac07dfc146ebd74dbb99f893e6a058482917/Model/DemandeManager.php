<?php
class DemandeManager extends Model{
	public function Demande(){
		
		$requete = 'Select nomVip, penomVip, requete, deadLine from Vip v, Demande d where v.idVip=d.idVip';
		$vip = $this->executerRequete($requete);
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		$vip->closeCursor();
		return $result;
		}
	public function insert_demande($idvip,$dem,$date_deb,$deadline){
		$requete = 'Insert into Demande values (?,?,?,?,?)';
		$this->executerRequete($requete,array("",$idvip,$dem,$date_deb,$deadline));
	}
	public function rechercheDemande($string){
		$requete= 'Select nomVip, penomVip, requete, deadLine from Vip v, Demande d where v.idVip=d.idVip and requete like ?';
		$vip = $this->executerRequete($requete,array('%'.$string.'%'));
		$result = $vip->fetchAll();
		$vip->closeCursor();
		return $result;
	}
	
	public function demandeEnCours(){
		$requete = "Select nomVip, penomVip, requete, deadLine from Vip, Demande, Actions where Actions.statut='En cours' and Actions.idDemande=Demande.idDemande and Demande.idVip=Vip.idVip";
		$demandes = $this->executerRequete($requete);
		$res = $demandes->fetchAll(PDO::FETCH_ASSOC);
		return $res;
	}
	public function demandesVip($idVip){
		$requete='Select requete,dateDebut,deadLine from Demande where idVip=?';
		$vip=$this->executerRequete($requete,array($idVip));
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
}
?>