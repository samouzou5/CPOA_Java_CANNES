package Metier;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Madanael
 */
import java.util.*;

public class Planning {
   private String idPlanning;
   private String nomPlanning;
   private Date debutPlanning;
   private Date finPlanning;
   private ArrayList<Projection> lp;
   
   private static int id;
   /**
    * 
    * @param nom//nom du planning
    * @param deb//date de début du planning
    * @param fin //date de fin planning
    */
   public Planning(String nom, Date deb, Date fin){//constructeur
       this.nomPlanning = nom;
       this.debutPlanning = deb;
       this.finPlanning = fin;
       
       this.idPlanning = "P"+Integer.toString(id);
       id++;
   }

    public Planning(int aInt, String string, int aInt0, java.sql.Date date) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   
   public Boolean verifierCreneaux() {//vérification de la disponibilité des créneaux
      // TODO: implement
      return null;
   }
   
   public Date getListeCreneaux() {//récupérer les créneaux
      // TODO: implement
      return null;
   }
   
   public void ajouterProjection(Projection proj) {//ajouter une projection
       lp.add(proj);
   }
   
   public Planning getPlanning(String nomPlanning) {//récupérer planning
      // TODO: implement
      return null;
   }
   
   public void retirerProjection(int idProjection) {//retirer une projection
      // TODO: implement
   }
   
   public int getNbFilmJournalier() {//récupérer nombre de films journalier
      // TODO: implement
      return 0;
   }

}