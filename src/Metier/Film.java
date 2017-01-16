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
public class Film {
   
   private String idFilm;
   private String nomFilm;
   private String categorieFilm;
   private String statusFilm;   
   private int dureeFilm;
   
   private static int id=1;
  /**
   * 
   * @param titre //titre du film
   * @param status //staut du film (en compétition, hors catégorie...)
   * @param duree //durée du film en minutes
   */ 
   public Film(String titre, String status, int duree){
       this.nomFilm = titre;
       this.statusFilm = status;
       this.dureeFilm = duree;
       this.idFilm = 'F'+Integer.toString(id);
       id++;
   }
   /**
    * 
    * @param id //id du film
    * @param cat//catégorie du film
    * @param nom//nom du film
    * @param status//statut du film
    * @param duree //durée du film
    */
   public Film(String id, String cat, String nom, String status, int duree){
       this.categorieFilm=cat;
       this.dureeFilm=duree;
       this.idFilm=id;
       this.nomFilm=nom;
       this.statusFilm=status;
   }

    public Film(int aInt, String string, int aInt0, int aInt1) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
   
   public String getIdFilm() {//récupérer id du film
      String r = this.idFilm; 
      return r;
   }
   public String getNomFilm(){//récupérer le nom du film
       return nomFilm;
   }
   
   public void setNomFilm(String newNom) {//mettre à jour le nom du film
      this.nomFilm = newNom;
   }
   
   public void setDureeFilm(int newDuree) {//mettre à jour la durée du film
       if (newDuree > 0){
           this.dureeFilm = newDuree;
       }
       
   }
   
   public String getCatFilm() {//récupérer la catégorie du film
      return this.categorieFilm;
   }

}
