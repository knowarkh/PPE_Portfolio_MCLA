package dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.util.GregorianCalendar;
import java.sql.Statement;

import aeronautique.Pilote;
import aeronautique.Vol;

/**
 * étape 2 : le patron de conception DAO, le lien vers notre table PILOTE
 * On étend la classe DAO avec un Pilote
 * @author abi
 *
 */
public class VolDAO extends DAO<Vol> {

	// 2 constantes de classe : le nom de la table, la clé primaire
	private static final String TABLE="Vol";
	private static final String CLE_PRIM_NUMVOL="numVol";

	/* !!! DATES : pour les bases de données, on passera par java.sql.Timestamp 
	 * Pour le find :
	 * GregorianCalendar hArr = new GregorianCalendar();
	 * hArr.setTimeInMillis (rs.getTimestamp("harr").getTime());
	 * Pour le create :
	 * Timestamp ts = new Timestamp (vol.gethDep().getTimeInMillis());
	 * pst.setTimestamp(3,ts);
	 * 
	 * NB : les mois dans le constructeur de Gregorian Calendar vont de 0 à 11.
	 * 
	 * En utilisant SimpleDateFormat, on peut avoir un affichage avec des termes français.
	 * SimpleDateFormat simpleDateFormat = new SimpleDateFormat("dd MMMM yyyy zzzz G", Locale.FRENCH);
	 * 
	 */


	/**
	 * On donne un vol en entrée qu'on va écrire dans la base de données
	 * La requête à utiliser est un INSERT INTO
	 * On utilise encore TimeStamp
	 */
	@Override
	public boolean create(Vol obj) {
		PreparedStatement pst = null;
		boolean succes=true;
		try {
			// Le prepared Statement prépare notre requete.
			// On peut utiliser les méthodes setInt, setTimestamp, setString...
			// Puis on utilise executeUpdate
			String req = "INSERT INTO "+TABLE+" (numPil,numAV,villeDep,villeArr,hDep,hArr) VALUES(?,?,?,?,?,?);";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setInt(1, obj.getPilote().getNumPil());
			pst.setInt(2, obj.getAvion().getNumAv());
			pst.setString(3, obj.getVilleDep());
			pst.setString(4, obj.getVilleArr());
			Timestamp ts1 = new Timestamp (obj.gethDep().getTimeInMillis());
			pst.setTimestamp(5, ts1);
			Timestamp ts2 = new Timestamp (obj.gethArr().getTimeInMillis());
			pst.setTimestamp(6, ts2);
			pst.executeUpdate();
			pst.close();
			// Ensuite, il faut remettre à jour l'identifiant de l'objet java,
			// généré automatiquement par la base de données
			int MaxId = Connexion.getMaxId(CLE_PRIM_NUMVOL, TABLE);
			obj.setNumVol(MaxId);

		} catch (SQLException e) {
			succes=false;
			e.printStackTrace();
		}
		return succes;
	}

	/**
	 * On donne un vol en entrée qu'on va supprimer de la base de données
	 * La requête à utiliser est un DELETE FROM
	 * 
	 */
	@Override
	public boolean delete(Vol obj) {
		boolean succes=true;
		int id = obj.getNumVol();
		PreparedStatement pst = null;
		try {
			// prepared Statement et executeUpdate
			String req = "DELETE FROM "+TABLE+" WHERE "+CLE_PRIM_NUMVOL+" = ?;";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setInt(1, id);
			pst.executeUpdate();
			pst.close();

		} catch (SQLException e) {
			succes = false;
			e.printStackTrace();
		} 
		return succes;		
	}

	/**
	 * On donne un vol en entrée qu'on va mettre à jour dans la base de données
	 * La requête à utiliser est un UPDATE SET
	 * 
	 */
	@Override
	public boolean update(Vol obj) {
		boolean succes=true;
		PreparedStatement pst = null;
		int id = obj.getNumVol();
		try {
			// requete, preparedStatement, setInt, setString, setTimeStamp etc. puis executeUpdate
			String req = "UPDATE "+TABLE+" SET numPil = ?, numAv = ?, villeDep = ?, villeArr = ?, hDep = ?, hArr = ? WHERE "+CLE_PRIM_NUMVOL+" = ?;";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setInt(1, obj.getPilote().getNumPil());
			pst.setInt(2, obj.getAvion().getNumAv());
			pst.setString(3, obj.getVilleDep());
			pst.setString(4, obj.getVilleArr());
			Timestamp ts1 = new Timestamp (obj.gethDep().getTimeInMillis());
			pst.setTimestamp(5, ts1);
			Timestamp ts2 = new Timestamp (obj.gethArr().getTimeInMillis());
			pst.setTimestamp(6, ts2);
			pst.setInt(7, id);
			pst.executeUpdate();
			pst.close();

		} catch (SQLException e) {
			succes = false;
			e.printStackTrace();
		} 
		return succes;	
	}

	/**
	 * On donne un identifiant entier en entrée qu'on cherche dans la base de données
	 * La requête à utiliser est un SELECT FROM WHERE avec la clé primaire
	 * 
	 */
	@Override
	public Vol find(int id) {
		Vol vol = null;
		try {
			// manipulation d'un resultSet, création d'un objet Vol
			String req = "SELECT * FROM "+TABLE+" WHERE "+CLE_PRIM_NUMVOL+" = "+id+";";
			ResultSet rs = Connexion.executeQuery(req);
			rs.isBeforeFirst();
			while (rs.next()) {
				GregorianCalendar hDep = new GregorianCalendar();
				hDep.setTimeInMillis (rs.getTimestamp("hDep").getTime());
				GregorianCalendar hArr = new GregorianCalendar();
				hArr.setTimeInMillis (rs.getTimestamp("harr").getTime());
				int numPil = rs.getInt(2);
				//new PiloteDAO().find(numPil);
				int numAv = rs.getInt(3);
				//new AvionDAO().find(numAv);
				vol = new Vol(new PiloteDAO().find(numPil),	
					new AvionDAO().find(numAv),
					//rs.getObject(3),
					rs.getString(4), 
					rs.getString(5), 
					hDep, 
					hArr);
				vol.setNumVol(rs.getInt(1));
			}
			rs.close();
			
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return vol;
	}

}
