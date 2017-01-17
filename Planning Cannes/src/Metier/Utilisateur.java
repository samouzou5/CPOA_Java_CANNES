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
    /**
     * 
     * @param login //login del'utilisateur
     * @param mdp//mot de passe de l'utilisateur
     * @param nom//nom de l'utilisateur
     * @param prenom //prénom de l'utilisateur
     */
    public Utilisateur(String login, String mdp, String nom, String prenom){//constructeur d'Utilisateur
        this.mdp=mdp;
        this.nom=nom;
        this.prenom=prenom;
        
        this.login=login;
    }
    
    public Utilisateur(String login, String mdp){//constructeur par défaut
        this.mdp=mdp;
        this.nom=null;
        this.prenom=null;
        
        this.login=login;
    }
    
    public String getLogin(){//récupérer login
        return this.login;
    }
    
    public boolean verificationMdp(Utilisateur u){//vérifier mdp
        return u.mdp.equals(this.mdp);
    }
    
    public boolean equals(Object o){//comparer des objets
        if (o==null) return false;
        if (o.getClass()!=this.getClass()) return false;
        
        Utilisateur u = (Utilisateur) o;
        return this.login.equals(u.login);
    }
    
}
