package Modele;

import Metier.Projection;
import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
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
public class ProjectionDAO {

    private static DataSourceDAO ds;
    public ArrayList<Projection> listeProjection = new ArrayList<Projection>();

    public ArrayList<Projection> getObjetsProjection(String date) throws IOException, ClassNotFoundException, SQLException {//recupère un ensemble de projections pour une date donnéee
        Connection connexionBD = null;
        ResultSet rset = null, rset1 = null, rset2 = null;
        Statement stmt = null;
        PreparedStatement pst = null, pst1 = null, pst2 = null;
        connexionBD = ds.getConnection("connexion.properties");
        try {
            stmt = connexionBD.createStatement();
            pst = connexionBD.prepareStatement("select * from Projection where dateProjection = ?");
            pst.setString(1, date);
            rset = pst.executeQuery();
            while (rset.next()) {
                pst1 = connexionBD.prepareStatement("select nomSalle from Salle where idSalle = ? ");
                pst1.setInt(1, rset.getInt(2));
                rset1 = pst1.executeQuery();
                pst2 = connexionBD.prepareStatement("select nomFilm from Film where idFilm = ? ");
                pst2.setInt(1, rset.getInt(3));
                rset2 = pst2.executeQuery();
                while (rset1.next()) {
                    while (rset2.next()) {
                        String s = Integer.toString(rset.getInt(1));
                        Projection projection = new Projection(rset.getString(4), date, rset.getString(6), rset.getString(7), rset1.getString(1), rset2.getString(1));
                        listeProjection.add(projection);
                    }
                }
            }
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return listeProjection;//liste contenant toutes les projections
    }

    public int supprimerProjection(String nom_p, String date) throws IOException, ClassNotFoundException, SQLException {// permet de supprimer une projection
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        connexionBD = ds.getConnection("connexion.properties");
        int q = 0;
        try {
            stmt = connexionBD.createStatement();
            //requête paramètrée pour la suppression
            PreparedStatement st = connexionBD.prepareStatement("DELETE FROM Projection WHERE nomProjection = ? and dateProjection = ?");
            st.setString(1, nom_p);
            st.setString(2, date);
            q = st.executeUpdate();
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return q;
    }

    public int update_proj(String proj, String salle, String date2, String hd, String hf, String film) throws SQLException, IOException, ClassNotFoundException {
        //permet la mise à jour d'une projection donnée
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        connexionBD = ds.getConnection("connexion.properties");
        int s1 = 0, s2 = 0;
        stmt = connexionBD.createStatement();
        //recuperation des id film et salle
        PreparedStatement pst = connexionBD.prepareStatement("SELECT idSalle as sal from Salle where nomSalle=?");
        pst.setString(1, salle);
        rset = pst.executeQuery();
        while (rset.next()) {
            s1 = rset.getInt("sal");
        }
        PreparedStatement pst1 = connexionBD.prepareStatement("SELECT idFilm as sal from Film where nomFilm=?");
        pst1.setString(1, film);
        rset = pst1.executeQuery();
        while (rset.next()) {
            s2 = rset.getInt("sal");
        }
        //requete paramètrée pour effectuer la mise à jour de la projection
        PreparedStatement pst2 = connexionBD.prepareStatement("UPDATE Projection set idFilm = ?, dateProjection=? , heureDebut = ?, heureFin = ?, idSalle = ? where nomProjection = ?");
        pst2.setInt(1, s2);
        pst2.setString(2, date2);
        pst2.setString(3, hd);
        pst2.setString(4, hf);
        pst2.setInt(5, s1);
        pst2.setString(6, proj);
        int e = pst2.executeUpdate(); //nb de lignes retournées par le traitement
        return e;
    }

    //dispoProjectionHeureDebut vérifie si une projection peut être placée ou non
    public boolean dispoProjectionHeureDebut(String hd, String salle, String date) throws IOException, ClassNotFoundException, SQLException {
        Connection connexionBD = null;
        ResultSet rset = null, rset1 = null;
        Statement stmt = null;
        boolean dispo = true;
        PreparedStatement ps2 = null;
        connexionBD = ds.getConnection("connexion.properties");
        int s1 = 0, s2 = 0;
        try {
            stmt = connexionBD.createStatement();
            PreparedStatement pst1 = connexionBD.prepareStatement("SELECT idSalle as sal from Salle where nomSalle=?");
            pst1.setString(1, salle);
            rset = pst1.executeQuery();
            while (rset.next()) {
                s1 = rset.getInt("sal");
            }
            ps2 = connexionBD.prepareStatement("SELECT * from Projection where CAST(heureDebut as time) <= ? and CAST(heureFin as time) >= ?"
                    + "and dateProjection = ? and idSalle = ?");
            ps2.setString(1, hd);
            ps2.setString(2, hd);
            ps2.setString(3, date);
            ps2.setInt(4, s1);
            rset1 = ps2.executeQuery();
            while(rset1.next()){
                s2 = rset1.getInt(1);
            }

        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        if (s2 > 0) {
            dispo = false;
        }
        return dispo;
    }
    public boolean dispoProjectionHeureFin(String hf, String salle, String date) throws IOException, ClassNotFoundException, SQLException {
        Connection connexionBD = null;
        ResultSet rset = null, rset1 = null;
        Statement stmt = null;
        boolean dispo = true;
        PreparedStatement ps2 = null;
        connexionBD = ds.getConnection("connexion.properties");
        int s1 = 0, s2 = 0;
        try {
            stmt = connexionBD.createStatement();
            PreparedStatement pst1 = connexionBD.prepareStatement("SELECT idSalle as sal from Salle where nomSalle=?");
            pst1.setString(1, salle);
            rset = pst1.executeQuery();
            while (rset.next()) {
                s1 = rset.getInt("sal");
            }
            ps2 = connexionBD.prepareStatement("SELECT * from Projection where CAST(heureDebut as time) <= ? and CAST(heureFin as time) >= ?"
                    + "and dateProjection = ? and idSalle = ?");
            ps2.setString(1, hf);
            ps2.setString(2, hf);
            ps2.setString(3, date);
            ps2.setInt(4, s1);
            rset1 = ps2.executeQuery();
            while(rset1.next()){
                s2 = rset1.getInt(1);
            }

        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        if (s2 > 0) {
            dispo = false;
        }
        return dispo;
    }
    
    

    //ajout_proj permet l'ajout d'une projection à la base de données
    public int ajout_proj(String film, String salle, String date, String nom_p, String hd, String hf) throws SQLException {
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        int b1 = 0;
        int s = 0;
        int s1 = 0;
        try {
            connexionBD = ds.getConnection("connexion.properties");
            stmt = connexionBD.createStatement();
            PreparedStatement pst = connexionBD.prepareStatement("SELECT idFilm as f from Film where nomFilm=?");
            pst.setString(1, film);
            rset = pst.executeQuery();
            while (rset.next()) {
                s = rset.getInt("f");
            }
            System.out.println(s);
            PreparedStatement pst1 = connexionBD.prepareStatement("SELECT idSalle as sal from Salle where nomSalle=?");
            pst1.setString(1, salle);
            rset = pst1.executeQuery();
            while (rset.next()) {
                s1 = rset.getInt("sal");
            }
            String req = "INSERT INTO Projection (idFilm,idSalle,nomProjection,dateProjection,heureDebut,heureFin) VALUES"
                    + "(?,?,?,?,?,?)";
            PreparedStatement pst2 = connexionBD.prepareStatement(req);
            pst2.setInt(1, s);
            pst2.setInt(2, s1);
            pst2.setString(3, nom_p);
            pst2.setString(4, date);
            pst2.setString(5, hd);
            pst2.setString(6, hf);
            b1 = pst2.executeUpdate();
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return b1;
    }

    public void setDataSource(DataSource ds) {
        ProjectionDAO.ds = (DataSourceDAO) ds;
    }

    public Connection getConnection() throws SQLException, IOException, ClassNotFoundException {
        return (ds.getConnection("connexion.properties"));
    }

}
