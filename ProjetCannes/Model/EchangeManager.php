<?php

class EchangeManager extends Model{
	
	public function creerEchange($vip,$titre,$date,$moyen,$text){
		$requete = 'Insert into Echange  values(?,?,?,?,?,?)';
		$this->executerRequete($requete,array("",$vip,$titre,$date,$moyen,$text));
	}
	public function echange($idVip){
		$requete='select idEchange, intitule, dateEchange, plateforme, contenu from Echange where idVip=? order by dateEchange desc';
		$recent = $this->executerRequete($requete,array($idVip));
		$vip= $recent->fetchAll(PDO::FETCH_ASSOC);
		if(isset($vip[0]) and isset($vip[1]) and isset($vip[2])){
			return array($vip[0],$vip[1],$vip[2]);
		}
		else if (isset($vip[0]) and isset($vip[1])){
			return array($vip[0],$vip[1]);
		}
		else if (isset($vip[0])){
			return array($vip[0]);
			
		}else{
			return null;
		}
		
	}
	
	public function newEchange(){
		$req = 'Select count(*) from Echange';
		$res = $this->executerRequete($req);
		$avDernier = $res->fetch();
		$avDernier[0] = $avDernier[0]-4;
		
		$requete='select nomVip, penomVip, intitule, contenu, dateEchange from Echange,Vip where idEchange>? and Echange.idVip=Vip.idVip';
		$recent = $this->executerRequete($requete,array($avDernier[0]));
		$vip= $recent->fetchAll(PDO::FETCH_ASSOC);
		return $vip;
	}
	
}

?>