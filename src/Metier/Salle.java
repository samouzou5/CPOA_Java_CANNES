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
public class Salle {
    
   private String idSalle;
   private int nbPlacesSalle;
   private String nomSalle;
   private String typeFilm;
   
   private static int id;
   /**
    * 
    * @param nom //nom de la salle
    * @param type //type de film projeté
    * @param places //nombre de places
    */
   public Salle(String nom, String type, int places){//constructeur
       this.nomSalle = nom;
       this.nbPlacesSalle = places;
       this.typeFilm = type;
       
       this.idSalle = "S"+Integer.toString(id);
       id++;
   }

    public Salle(int aInt, String string, int aInt0, String string0) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   

}