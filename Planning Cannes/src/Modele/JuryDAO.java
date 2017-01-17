/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modele;
import Metier.Jury;
import java.io.IOException;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import javax.sql.DataSource;

/**
 *
 * @author Steev
 */
public class JuryDAO {

    
    private static DataSourceDAO ds;//objet pour la connexion
    public List<Jury> listeJury = new ArrayList<Jury>();//liste des jurys
    
    public List<Jury> getObjetsJury() {//récupérer l'ensemble des jurys
        Connection connexionBD=null;
        ResultSet rset=null;
        Statement stmt=null;
        try {
            connexionBD=ds.getConnection("connexion.properties");
            stmt=connexionBD.createStatement();
            rset=stmt.executeQuery("select * from JURY");
            while(rset.next()) {
                Jury jury = new Jury(rset.getInt(1),rset.getString(3),rset.getInt(4),rset.getInt(5));
                listeJury.add(jury);//ajout d'un nouveau jury dans la liste
            } 
        }
        catch(Exception e) {
            System.err.println("Problème: "+e.getMessage());//si erreur dans la requête lever l'exception
        }
        return listeJury;
    }
    
        
    public void setDataSource(DataSource ds) {//setter
        JuryDAO.ds=(DataSourceDAO) ds;
    }
    
     
    public Connection getConnection() throws SQLException, IOException, ClassNotFoundException {//getter connexion
        return(ds.getConnection("connexion.properties"));
    }
    
     
    public void closeConnection(Connection c) throws SQLException {//fermer la connexion
       if(c!=null) c.close();  
    }
    
    
    
}
