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
    
    private String idJury;//id du jury
    private String nomJury;//le nom du jury
    
    private static int id;//id du jury pour l'objet Jury
    
    public Jury(String nom){//constructeur de Jury
        this.nomJury = nom;
        
        this.idJury = "J"+Integer.toString(id);
        id++;
    }
    

    public Jury(int aInt, String string, int aInt0, int aInt1) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
    public String getJuryId(){//récupérer l'id du jury
        String r = this.nomJury;
        return r;
    }

}