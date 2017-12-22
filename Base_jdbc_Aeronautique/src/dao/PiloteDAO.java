package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import aeronautique.Pilote;

public class PiloteDAO extends DAO<Pilote> {

	//---2 constantes de classe---
	private static final String TABLE="Pilote";
	private static final String CLE_PRIM_NUMPIL="numPil";
	
	//---méthodes CRUD---
	@Override
	public boolean create(Pilote obj) {
		PreparedStatement pst = null;
		boolean succes=true;
		try {
			//---Le prepared Statement prépare notre requete puis on utilise executeUpdate---
			String req = "INSERT INTO "+TABLE+" (nomPil,adr,sal) VALUES(?,?,?);";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setString(1, obj.getNomPil());
			pst.setString(2, obj.getAdr());
			pst.setInt(3, obj.getSal());
			pst.executeUpdate();
			pst.close();
			//---Ensuite, il faut remettre à jour l'identifiant de l'objet java,
			// généré automatiquement par la base de données---
			int maxId = Connexion.getMaxId(CLE_PRIM_NUMPIL, TABLE);
			obj.setNumPil(maxId);

		} catch (SQLException e) {
			succes=false;
			e.printStackTrace();
		}
		return succes;
	}

	@Override
	public boolean delete(Pilote obj) {
		boolean succes=true;
		int id = obj.getNumPil();
		PreparedStatement pst = null;
		try {
			//---prepared Statement et executeUpdate---
			String req = "DELETE FROM "+TABLE+" WHERE "+CLE_PRIM_NUMPIL+" = ?;";
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

	@Override
	public boolean update(Pilote obj) {
		boolean succes=true;
		PreparedStatement pst = null;
		int id = obj.getNumPil();
		try {
			//---requete, preparedStatement, setInt, setString, setTimeStamp etc. puis executeUpdate---
			String req = "UPDATE "+TABLE+" SET nomPil = ?, adr = ?, sal = ? WHERE "+CLE_PRIM_NUMPIL+" = ?;";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setString(1, obj.getNomPil());
			pst.setString(2, obj.getAdr());
			pst.setInt(3, obj.getSal());
			pst.setInt(4, id);
			pst.executeUpdate();
			pst.close();

		} catch (SQLException e) {
			succes = false;
			e.printStackTrace();
		} 
		return succes;	
	}

	@Override
	public Pilote find(int id) {
		Pilote pilote = null;
		try {
			String req = "SELECT * FROM "+TABLE+" WHERE "+CLE_PRIM_NUMPIL+" = "+id+";";
			ResultSet rs = Connexion.executeQuery(req);
			rs.isBeforeFirst();
			while (rs.next()) {
				pilote = new Pilote(
						rs.getString(2), 
						rs.getString(3),
						rs.getInt(4));
				pilote.setNumPil(rs.getInt(1));
			}
			rs.close();

		} catch (SQLException e) {
			e.printStackTrace();
		}
		return pilote;
	}

}
