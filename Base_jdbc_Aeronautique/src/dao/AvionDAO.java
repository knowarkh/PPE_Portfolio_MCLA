package dao;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import aeronautique.Avion;

public class AvionDAO extends DAO<Avion> {
	
	//---2 constantes de classe---
	private static final String TABLE="Avion";
	private static final String CLE_PRIM_NUMAV="numAv";

	//---m�thodes CRUD---
	@Override
	public boolean create(Avion obj) {
		PreparedStatement pst = null;
		boolean succes=true;
		try {
			//---Le prepared Statement pr�pare notre requete puis on utilise executeUpdate---
			String req = "INSERT INTO "+TABLE+" (nomAv,capacite,loc) VALUES(?,?,?);";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setString(1, obj.getNomAv());
			pst.setInt(2, obj.getCapacite());
			pst.setString(3, obj.getLoc());
			pst.executeUpdate();
			pst.close();
			//---Ensuite, il faut remettre � jour l'identifiant de l'objet java,
			// g�n�r� automatiquement par la base de donn�es---
			int maxId = Connexion.getMaxId(CLE_PRIM_NUMAV, TABLE);
			obj.setNumAv(maxId);

		} catch (SQLException e) {
			succes=false;
			e.printStackTrace();
		}
		return succes;
	}

	@Override
	public boolean delete(Avion obj) {
		boolean succes=true;
		int id = obj.getNumAv();
		PreparedStatement pst = null;
		try {
			//---prepared Statement et executeUpdate---
			String req = "DELETE FROM "+TABLE+" WHERE "+CLE_PRIM_NUMAV+" = ?;";
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
	public boolean update(Avion obj) {
		boolean succes=true;
		PreparedStatement pst = null;
		int id = obj.getNumAv();
		try {
			//---requete, preparedStatement, setInt, setString, setTimeStamp etc. puis executeUpdate---
			String req = "UPDATE "+TABLE+" SET nomAv = ?, capacite = ?, loc = ? WHERE "+CLE_PRIM_NUMAV+" = ?;";
			pst = Connexion.getInstance().prepareStatement(req);
			pst.setString(1, obj.getNomAv());
			pst.setInt(2, obj.getCapacite());
			pst.setString(3, obj.getLoc());
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
	public Avion find(int id) {
		Avion avion = null;
		try {
			String req = "SELECT * FROM "+TABLE+" WHERE "+CLE_PRIM_NUMAV+" = "+id+";";
			ResultSet rs = Connexion.executeQuery(req);
			rs.isBeforeFirst();
			while (rs.next()) {
				avion = new Avion(
						rs.getString(2), 
						rs.getInt(3),
						rs.getString(4));
				avion.setNumAv(rs.getInt(1));
			}
			rs.close();

		} catch (SQLException e) {
			e.printStackTrace();
		}
		return avion;
	}

}
