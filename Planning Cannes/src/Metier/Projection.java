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
   
   /**
    * 
    * @param nom//nom projection
    * @param dateProj//date de la projection
    * @param heureD//heure de début de laprojection
    * @param heureF//heure de fin de la projection
    * @param f//film associé
    * @param s //salle associée
    */
   public Projection(String nom,String dateProj,String heureD,String heureF, String f, String s) {//constructeur
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
   
   

   
   public String getIdProjection() {//récuperer l'id de la projection
       return idProjection;
       
   }
   public String getNomProj(){//récupérer le nom d'une projection
       return nomProjection;
   }
   
   public String getHeureDeb(){//récupérer l'heure de début
       return heureDebut;
   }
   public String getHeureFin(){//récupérer l'heure de fin
       return heureFin;
   }

    @Override
    public int compareTo(Object o) {//méthode de comparaison des objets
        if (o.getClass()!=this.getClass()){
            return -1;
        }
        else{
            Projection proj = (Projection)o;
            return (this.heureDebut.compareTo(proj.heureDebut));
        }
    }

}


