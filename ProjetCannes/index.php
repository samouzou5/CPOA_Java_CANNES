<?php
	session_name('p1504841');
	session_start();
	require("Model/Model.php");
	require("Model/AdminManager.php");
	require("Model/VipManager.php");
	require("Model/DemandeManager.php");
	require("Model/ActionManager.php");
	require("Model/EchangeManager.php");
	$em=new EchangeManager();
	$am=new AdminManager();
	$vp=new VipManager();
	$dm=new DemandeManager();
	$am1=new ActionManager();
	/*
	if(isset($_POST["valid1"])){
		$result=$dm->insert_demande($_POST["f"],$_POST["demande"],$_POST["deb"],$_POST["date_fin"]);
		$result=$dm->Demande();
		require("Views/demandes.php");
		
	}
	if(isset($_POST["valid2"])){
		$result=$dm->insert_demande($_POST["cache"],$_POST["demande1"],$_POST["date1"],$_POST["date2"]);
		$result=$dm->Demande();
		require("Views/demandes.php");
	}
	*/
	if(isset($_GET["action"])){
		
		if(isset($_GET["idvip"])&& $_GET["action"]=="demander"){
				$result4=$vp->getInfoVip1($_GET["idvip"]);
				require("Views/creation_demande.php");
			}
		if(isset($_GET["idvip"])&& $_GET["action"]=="echange"){
				$result4=$vp->getInfoVip1($_GET["idvip"]);
				require("Views/echange.php");
			}
		if($_GET["action"]=="verification"){
			$res=$am->getInfoAdmin($_POST["login"],$_POST["mdp"]);
			if($res==0){
				$nope=1;
				require("Views/connexion_gest_vip.php");
			}else{
				$_SESSION ["login"] = $_POST["login"];
				$newvip=$vp->newVip();
				$demandes=$dm->demandeEnCours();
				$newEch=$em->newEchange();
				require("Views/accueil.php");
			}		
		}
		if($_GET["action"]=="deconnexion"){
			$_SESSION = array();
			session_destroy();
			require("Views/connexion_gest_vip.php");
		}
		if($_GET["action"]=="recherche_vip"){
			$res3=$vp->rechercheVip($_POST["rech_vip"]);
			require("Views/recherche_vip.php");
		}
		if($_GET["action"]=="listeVIP"){
			$result=$vp->allVip();
			require("Views/vip.php");
		}
		if($_GET["action"]=="accueil"){
			$newvip=$vp->newVip();
			$demandes=$dm->demandeEnCours();
			$newEch=$em->newEchange();
			require("Views/accueil.php");
		}
		if($_GET["action"]=="creation_fiche"){
			require("Views/creation_fiche.php");
		}
		if($_GET["action"]=="creation"){
			$vp->ajouterVip($_POST["nom"],$_POST["prenom"],$_POST["sexe"],$_POST["select"],$_POST["import"],$_POST["surnom"],$_POST["nation"],$_POST["profession"],$_POST["date_n"],$_POST["lieu_r"],$_POST["enf"],$_POST["infos"],$_POST["photo"]);
			$result=$vp->allVip();
			require("Views/vip.php");
		}
		if($_GET["action"]=="demandes"){
			$result=$dm->Demande();
			require("Views/demandes.php");
		}
		if($_GET["action"]=="agir"){
			$info = $dm->getInfoDemande($_GET["idDemande"]);
			require("Views/creation_action.php");
		}
		if($_GET["action"]=="recherche_demande"){
			$result=$dm->rechercheDemande($_POST["search1"]);
			require("Views/demandes.php");
		}
		if($_GET["action"]=="creation_demande"){
			$result1=$vp->allVip();
			require("Views/creation_demande.php");
		}
		if($_GET["action"]=="actions"){
			if (isset($_GET["idDemande"])){
				$result=$am1->ActionsDemande($_GET["idDemande"]);
			}
			else{
				$result=$am1->Actions();
			}
			require("Views/actions.php");
		}
		if($_GET["action"]=="Supprimer"){
			$result=$vp->supprimerVip($_POST["idvip"]);
			$result=$vp->allVip();
			require("Views/vip.php");
		}
		if($_GET["action"]=="Modifier"){
			$res2=$vp->getInfoVip($_POST["idvip"]);
			require("Views/modifier_fiche_vip.php");
		}
		if($_GET["action"]=="modification"){
			$vp->modifierVip($_POST["idvip"],$_POST["select"],$_POST["import"],$_POST["surnom"],$_POST["nation"],$_POST["profession"],$_POST["lieu_r"],$_POST["enf"],$_POST["infos"],$_POST["photo"]);
			$result=$vp->allVip();
			require("Views/vip.php");
		}
		if($_GET["action"]=='ajout_echange'){
            $em->creerEchange($_POST["g"],$_POST["nom1"],$_POST["date_ech"],$_POST["comm"],$_POST["champ_text"]);
            $res2=$vp->getInfoVip($_POST["idvip"]);
            $res3=$vp->photo($_POST["idvip"]);
			$result=$em->echange($_GET["idvip"]);
            require("Views/profil_vip.php");
        }
		if($_GET["action"]=="insertion_demande"){
			if ($_POST["date2"]<$_POST["date1"]){
				$result1=$vp->allVip();
				$nope=1;
				require("Views/creation_demande.php");
			}else{
				$dm->insert_demande($_POST["idvip"],$_POST["demande"],$_POST["date1"],$_POST["date2"]);
				$result=$dm->Demande();
				require("Views/demandes.php");
			}
		}
		if ($_GET["action"]=="majAction"){
			$am1->UpdateAction($_POST["statut"],$_POST["idAction"]);
			$result=$am1->Actions();
			require("Views/actions.php");
		}
		if ($_GET["action"]=="creation_action"){
			$am1->AjouterAction($_POST["idDemande"],$_POST["nomA"],$_POST["statutA"],$_POST["dateA"]);
			$result=$am1->Actions();
			require("Views/actions.php");
		}
		
	}else{
		if(isset($_GET["idvip"])){
			$res2=$vp->getInfoVip($_GET["idvip"]);
			$res3=$vp->photo($_GET["idvip"]);
			$result=$em->echange($_GET["idvip"]);
			$result1=$dm->demandesVip($_GET["idvip"]);
			require("Views/profil_vip.php");
	}
	else
	{require("Views/connexion_gest_vip.php");}
	}
	
?>

