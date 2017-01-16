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
public class Jury {
    
    private String idJury;
    private String nomJury;
    
    private static int id;
    
    public Jury(String nom){
        this.nomJury = nom;
        
        this.idJury = "J"+Integer.toString(id);
        id++;
    }

    public Jury(int aInt, String string, int aInt0, int aInt1) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    public String getJuryId(){
        String r = this.nomJury;
        return r;
    }

}