/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modele;
import Metier.Jury;
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

    
    private static DataSource ds;
    public List<Jury> listeJury = new ArrayList<Jury>();
    
    public List<Jury> getObjetsJury() {
        Connection connexionBD=null;
        ResultSet rset=null;
        Statement stmt=null;
        try {
            connexionBD=ds.getConnection();
            stmt=connexionBD.createStatement();
            rset=stmt.executeQuery("select * from JURY");
            while(rset.next()) {
                Jury jury = new Jury(rset.getInt(1),rset.getString(3),rset.getInt(4),rset.getInt(5));
                listeJury.add(jury);
            } 
        }
        catch(Exception e) {
            System.err.println("Problème: "+e.getMessage());
        }
        return listeJury;
    }
    
        
    public void setDataSource(DataSource ds) {
        JuryDAO.ds=ds;
    }
    
     
    public Connection getConnection() throws SQLException {
        return(ds.getConnection());
    }
    
     
    public void closeConnection(Connection c) throws SQLException {
       if(c!=null) c.close();  
    }
    
    
    
}
