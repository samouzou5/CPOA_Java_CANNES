/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Metier;

/**
 *
 * @author STEEV
 */
public class Utilisateur {
    private String login;
    private String mdp;
    private String nom;
    private String prenom;
    
    public Utilisateur(String login, String mdp, String nom, String prenom){
        this.mdp=mdp;
        this.nom=nom;
        this.prenom=prenom;
        
        this.login=login;
    }
    
    public Utilisateur(String login, String mdp){
        this.mdp=mdp;
        this.nom=null;
        this.prenom=null;
        
        this.login=login;
    }
    
    public String getLogin(){
        return this.login;
    }
    
    public boolean verificationMdp(Utilisateur u){
        return u.mdp.equals(this.mdp);
    }
    
    public boolean equals(Object o){
        if (o==null) return false;
        if (o.getClass()!=this.getClass()) return false;
        
        Utilisateur u = (Utilisateur) o;
        return this.login.equals(u.login);
    }
    
}
