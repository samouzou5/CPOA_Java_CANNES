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
   
   public Planning(String nom, Date deb, Date fin){
       this.nomPlanning = nom;
       this.debutPlanning = deb;
       this.finPlanning = fin;
       
       this.idPlanning = "P"+Integer.toString(id);
       id++;
   }

    public Planning(int aInt, String string, int aInt0, java.sql.Date date) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   
   public Boolean verifierCreneaux() {
      // TODO: implement
      return null;
   }
   
   public Date getListeCreneaux() {
      // TODO: implement
      return null;
   }
   
   public void ajouterProjection(Projection proj) {
       lp.add(proj);
   }
   
   public Planning getPlanning(String nomPlanning) {
      // TODO: implement
      return null;
   }
   
   public void retirerProjection(int idProjection) {
      // TODO: implement
   }
   
   public int getNbFilmJournalier() {
      // TODO: implement
      return 0;
   }

}