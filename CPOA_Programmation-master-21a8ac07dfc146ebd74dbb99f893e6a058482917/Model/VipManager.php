<?php
class VipManager extends Model{
	public function allVip(){	
		$requete = 'Select idVip,nomVip, penomVip, profession from Vip';
		$vip = $this->executerRequete($requete);
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		$vip->closeCursor();
		return $result;
		}
	public function getInfoVip($idVip){
		$requete = 'Select idVip,nomVip,penomVip,sexe,Statut_pacte,importance,surnomVip
		,nationalite,profession,dateNaissance,residence,nbEnfant,infos from Vip where idVip=?';
		$vip = $this->executerRequete($requete,array($idVip));
		$result = $vip->fetch();
		$vip->closeCursor();
		return $result;
	}
	public function getInfoVip1($idVip){
		$requete = 'Select nomVip,penomVip from Vip where idVip=?';
		$vip = $this->executerRequete($requete,array($idVip));
		$result = $vip->fetchAll(PDO::FETCH_ASSOC);
		$vip->closeCursor();
		return $result;
	}
	
	public function rechercheVip($string){
		$requete= 'Select idVip,nomVip, penomVip, profession from Vip where nomVip like ?';
		$vip = $this->executerRequete($requete,array('%'.$string.'%'));
		$result = $vip->fetchAll();
		$vip->closeCursor();
		return $result;
		
	}
	
	public function ajouterVip($nom,$prenom,$sexe,$pacte,$importance,$surnom,$nationalite,$profession,$dateNaissance,$residence,$nbEnfant,$info,$photo){
	$requete='insert into Vip values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
	$vip=$this->executerRequete($requete,array("",$nom,$prenom,$sexe,$pacte,$importance,$surnom,$nationalite,$profession,$dateNaissance,$residence,$nbEnfant,$info,$photo));
	}
	public function photo($idVip){
		$requete='select photo from Vip where idVip=?';
		$vip = $this->executerRequete($requete,array($idVip));
		$result = $vip->fetch();
		$vip->closeCursor();
		return $result;
		
	}
	public function supprimerVip($idVip){
		$requete='delete from Vip where idVip=?';
		$vip = $this->executerRequete($requete,array($idVip));
		
	}
	public function modifierVip($idVip,$pacte,$importance,$surnom,$nationalite,$profession,$residence,$nbEnfant,$info,$photo){
		$requete='update Vip set Statut_pacte=?,importance=?,surnomVip=?,nationalite=?,profession=?,residence=?,nbEnfant=?,infos=?,photo=? where idVip=?';
		$vip = $this->executerRequete($requete,array($pacte,$importance,$surnom,$nationalite,$profession,$residence,$nbEnfant,$info,$photo,$idVip));
		
	}
	
	public function newVip(){
		$req = 'Select count(*) from Vip';
		$res = $this->executerRequete($req);
		$avDernier = $res->fetch();
		$avDernier[0] = $avDernier[0]-4;
		
		$requete='select idVip, nomVip, penomVip, profession from Vip where idVip>?';
		$recent = $this->executerRequete($requete,array($avDernier[0]));
		$vip= $recent->fetchAll(PDO::FETCH_ASSOC);
		return $vip;
	}
	
		
	
	
	}

?>