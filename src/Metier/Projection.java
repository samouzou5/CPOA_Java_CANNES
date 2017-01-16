/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Metier;

/**
 *
 * @author Madanael
 */
import java.text.ParseException;
import java.util.*;
import java.util.Date.*;
import java.text.SimpleDateFormat;


public class Projection implements Comparable{
   private String idProjection;
   private String nomProjection;
   private String dateProjection;
   private String heureDebut;
   private String heureFin;
   private String film;
   private String salle;

   
   private static int id=0;
   
   
   public Projection(String nom,String dateProj,String heureD,String heureF, String f, String s) {
       this.nomProjection=nom;
       this.dateProjection=dateProj;
       this.heureDebut=heureD;
       this.heureFin=heureF;
       this.film=f;
       this.salle=s;
       this.idProjection = "PR"+Integer.toString(id);
       id++;
   }

    public Projection(int aInt, java.sql.Date date, java.sql.Date date0, java.sql.Date date1) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   
   
  
   public ArrayList<Projection> getProjectionPlanning(int idPlanning) {
      return null;
   }
   
   
   public String getIdProjection() {
       return idProjection;
       
   }
   public String getNomProj(){
       return nomProjection;
   }
   
   public String getHeureDeb(){
       return heureDebut;
   }
   public String getHeureFin(){
       return heureFin;
   }

    @Override
    public int compareTo(Object o) {
        if (o.getClass()!=this.getClass()){
            return -1;
        }
        else{
            Projection proj = (Projection)o;
            return (this.heureDebut.compareTo(proj.heureDebut));
        }
    }

}


