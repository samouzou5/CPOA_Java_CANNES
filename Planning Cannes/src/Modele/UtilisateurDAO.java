/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modele;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;
import javax.sql.DataSource;
import Metier.Utilisateur;
import java.io.IOException;
import java.sql.PreparedStatement;
import java.sql.SQLException;
/**
 *
 * @author STEEV
 */
public class UtilisateurDAO {
    static DataSourceDAO ds;
    public UtilisateurDAO(){
        
    }
    public int verifConnexion(String login, String mdp){//permet de vérifier la connexion avec les paramètres login et mdp
        Connection connexionBD=null;
        int count=0;
        try {
            connexionBD=ds.getConnection("connexion.properties");
            //requête pour vérifier login et mdp
            PreparedStatement pst=connexionBD.prepareStatement("select COUNT(*) as total from Admin where login=? and mdp=?");
            //saisie des paramètres
            pst.setString(1, login);
            pst.setString(2, mdp);
            ResultSet rset=pst.executeQuery();
            while(rset.next()) {//curseur
                count = rset.getInt("total");
            } 
        }
        catch(Exception e) {
            System.err.println("Problème: "+e.getMessage());
        }
        return count;
    }
    public void setDataSource(DataSource ds) {
        UtilisateurDAO.ds=(DataSourceDAO) ds;
    }
    
    public Connection getConnection() throws SQLException, IOException, ClassNotFoundException {//ouvrir connexion
        return(ds.getConnection("connexion.properties"));
    }
    
    public void closeConnection(Connection c) throws SQLException {//fermer la connexion
       if(c!=null) c.close();  
    }
}
