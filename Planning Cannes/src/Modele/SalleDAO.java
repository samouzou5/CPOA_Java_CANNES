package Modele;

import Metier.Salle;
import java.io.IOException;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;
import javax.sql.DataSource;

public class SalleDAO {

    private static DataSourceDAO ds;//objet DAO pour exécuter les requêtes
    public List<Salle> listeSalle = new ArrayList<Salle>();//liste des salles

    public SalleDAO() {
    }

    public List<Salle> getObjetsSalle() {//recuperer la liste des salles grace a un objet DAO
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        try {
            connexionBD = ds.getConnection("connexion.properties");
            stmt = connexionBD.createStatement();
            rset = stmt.executeQuery("select * from Salle");
            while (rset.next()) {//parcours curseur et création des objets Salle
                Salle salle = new Salle(rset.getInt(1), rset.getString(2), rset.getInt(3), rset.getString(4));
                listeSalle.add(salle);
            }
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return listeSalle;
    }

    public void setDataSource(DataSource ds) {
        SalleDAO.ds = (DataSourceDAO) ds;
    }

    public Connection getConnection() throws SQLException, IOException, ClassNotFoundException {//ouvrir une connexion maria db
        return (ds.getConnection("connexion.properties"));
    }

    public void closeConnection(Connection c) throws SQLException {//fermer la connexion
        if (c != null) {
            c.close();
        }
    }
}
