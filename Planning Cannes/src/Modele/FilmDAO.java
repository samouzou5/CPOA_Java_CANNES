/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Modele;

import Metier.Film;
import static Modele.UtilisateurDAO.ds;
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
 * @author STEEV
 */
public class FilmDAO {

    private static DataSourceDAO ds;
    public ArrayList<Film> listeFilm = new ArrayList<Film>();//conteneur pour stocker les films

    public FilmDAO() {
    }

    public ArrayList<Film> getObjetsFilm() {//recupere la liste des films et leurs caractéristiques
        Connection connexionBD = null;
        ResultSet rset = null, rset1 = null;
        Statement stmt = null;
        try {
            connexionBD = ds.getConnection("connexion.properties");//connexion a la base de données
            stmt = connexionBD.createStatement();
            rset = stmt.executeQuery("select * from Film");//utilisation d'un ResultSet pour exécuter la requête
            while (rset.next()) {//parcours du curseur
                int a = rset.getInt(2);//récupération de l'id catégorie
                String req = "select nomCategorie from Categorie where idCategorie = " + a + "";
                rset1 = stmt.executeQuery(req);
                if (rset1.next()) {
                    Film film = new Film(rset.getString(1), rset1.getString(1), rset.getString(4), rset.getString(5), rset.getInt(6));//création d'un objet film
                    listeFilm.add(film);
                }
            }
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return listeFilm;
    }
    //modifier_film permet la modification d'un film donné
    public int modifier_film(String name, String colonne, String value) throws SQLException, IOException, ClassNotFoundException {
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        connexionBD = ds.getConnection("connexion.properties");
        stmt = connexionBD.createStatement();
        PreparedStatement pst = connexionBD.prepareStatement("UPDATE Film set " + colonne + " = ? where nomFilm = ?");
        switch (colonne) {//les cas possibles : modifier le nom du film, sa durée, son statut
            case "nomFilm":
                pst.setString(1, value);
                pst.setString(2, name);
                break;
            case "statusFilm":
                pst.setString(1, value);
                pst.setString(2, name);
                break;
            case "duree":
                int c = Integer.parseInt(value);
                pst.setInt(1, c);
                pst.setString(2, name);

        }
        int nb_ligne = pst.executeUpdate();//nombre de lignes modifiées
        return nb_ligne;

    }
    //ajout_film permet l'ajout d'un film dans la base de données
    public int ajout_film(String categorie, String jury, String nom, String statut, int duree) throws SQLException {
        Connection connexionBD = null;
        ResultSet rset = null;
        Statement stmt = null;
        int b1 = 0;
        String s = null, s1 = "";
        try {
            connexionBD = ds.getConnection("connexion.properties");
            stmt = connexionBD.createStatement();
            PreparedStatement pst = connexionBD.prepareStatement("SELECT idCategorie as cat from Categorie where nomCategorie=?");//récupération de l'id catégorie
            pst.setString(1, categorie);
            rset = pst.executeQuery();
            while (rset.next()) {//parcours curseur
                s = rset.getString("cat");
            }
            PreparedStatement pst1 = connexionBD.prepareStatement("SELECT idJury as jur from Jury where nomJury=?");//récupération de l'id jury
            pst1.setString(1, jury);
            rset = pst1.executeQuery();
            while (rset.next()) {
                s1 = rset.getString("jur");//récupération de l'id jury
            }
            String req = "INSERT INTO Film (idCategorie,idJury,nomFilm,statusFilm,dureeFilm) VALUES(?,?,?,?,?)";
            PreparedStatement pst2 = connexionBD.prepareStatement(req);//requête paramètrée
            int as = Integer.parseInt(s);
            int as1 = Integer.parseInt(s1);
            //saisie des paramètres
            pst2.setInt(1, as);
            pst2.setInt(2, as1);
            pst2.setString(3, nom);
            pst2.setString(4, statut);
            pst2.setInt(5, duree);
            b1 = pst2.executeUpdate();//exécution de la requête
        } catch (Exception e) {
            System.err.println("Problème: " + e.getMessage());
        }
        return b1;
    }

    public void setDataSource(DataSource ds) {
        FilmDAO.ds = (DataSourceDAO) ds;
    }

    public Connection getConnection() throws SQLException, IOException, ClassNotFoundException {//recupérer connexion
        return (ds.getConnection("connexion.properties"));
    }

    public void closeConnection(Connection c) throws SQLException {
        if (c != null) {
            c.close();
        }
    }

}
