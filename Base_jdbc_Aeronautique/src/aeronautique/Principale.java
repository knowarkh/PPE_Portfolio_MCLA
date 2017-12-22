package aeronautique;

import java.util.Calendar;
import java.util.GregorianCalendar;

import controleur.Controleur;
import dao.AvionDAO;
import dao.Connexion;
import dao.PiloteDAO;
import dao.VolDAO;


/**
 * - Il faut commencer par faire le métier, puis regarder la classe Connexion,
 * puis le Design Pattern DAO sur la table VOL
 * - Ensuite on étend aux autres tables AVION et PILOTE
 * - faire quelques vérifications de base sur la table vol :
 * lors du create, est-ce que les clés étrangères sont dans la table.
 * Il faut lever une exception précise dans le cas contraire.
 * - Essayer des requêtes plus complexes et les proposer dès le menu.
 * - Algorithmique : soigner l'affichage des réponses pour avoir un titre
 * aux colonnes et qu'elles soient de largeur fixe.
 * 
 * Si vous utilisez le type Money sous SQL Server Express, il faut utiliser
 * DECIMAL	avec JDBC et java.math.BigDecimal pour java.
 * 
 * @author abi
 *
 */
public class Principale {

	public static void main(String[] args) {

		//new Controleur();		
		//Connexion.fermer();

		//---test connexion à la BDD---
		//Connexion c = new Connexion();
		//Connexion.getInstance();
		//c.fermer();


		//---tests script creation de table et insertion de tuple---
		//		String requeteCreateTablePilote = "CREATE TABLE aeronautiquePPE.dbo.PILOTE\r\n" + 
		//				"	(numPil int IDENTITY(1,1) PRIMARY KEY not NULL,\r\n" + 
		//				"	nomPil varchar(100) not NULL,\r\n" + 
		//				"	adr varchar(100) not NULL,\r\n" + 
		//				"	sal int not NULL);";
		//		Connexion.executeUpdate(requeteCreateTablePilote);
		//		String requeteTestInsertTuple = "INSERT INTO aeronautiquePPE.dbo.PILOTE (nomPil,adr,sal)\r\n" + 
		//				"VALUES ('Jean','Nantes','15000');";
		//		Connexion.executeUpdate(requeteTestInsertTuple);
		//		Connexion.fermer();
		//		String requeteTestInsertTuple2 = "INSERT INTO aeronautiquePPE.dbo.PILOTE (nomPil,adr,sal)\r\n" + 
		//				"VALUES ('Mat','Rennes','13000');";
		//		Connexion.executeUpdate(requeteTestInsertTuple2);
		//		Connexion.fermer();


		//---Appel méthode initialisation -> création des tables et remplissage---
		//initialisation();


		//---test méthodes afficherSelectEtoile et getMaxId de la class Connexion---
		//		Connexion.afficheSelectEtoile("PILOTE", "sal>5000");
		//		System.out.println("------");
		//		System.out.println(Connexion.getMaxId("numPil", "PILOTE"));
		//		Connexion.fermer();


		//---test CRUD classe PiloteDAO---
		//createPilote("Alexis","Locmine",15000);
		//deletePilote("null","null",0,12);
		//updatePilote("Thomas","Vannes",15000,10);
		//findPilote(10);


		//---test CRUD classe AvionDAO---
		//createAvion("boeing",320,"Lyon");
		//deleteAvion("null", 0, "null", 8);
		//updateAvion("boeing", 250, "Lyon", 9);
		//findAvion(3);

		//---test CRUD classe VolDAO---
		GregorianCalendar hDep1 = new GregorianCalendar(2017,Calendar.DECEMBER,12,8,30,00);
		GregorianCalendar hArr1 = new GregorianCalendar(2017,Calendar.DECEMBER,12,9,30,00);
		Pilote pil = new Pilote("Deckard","Vannes",20000);
		pil.setNumPil(4);
		Avion av = new Avion("boeing",300,"Paris");
		av.setNumAv(7);
		
		//createVol(pil,av,"Paris","Vannes",hDep1,hArr1);
		//deleteVol(pil,av,"null","null",hDep1,hArr1,15);
		//updateVol(pil,av,"Rennes","Bordeaux",hDep1,hArr1,16);
		findVol(7);
		//findVol(5);

	}

	private static void findVol(int ident) {
		VolDAO volDAO1 = new VolDAO();
		System.out.println(volDAO1.find(ident));
		Connexion.fermer();
	}

	private static void updateVol(Pilote pilote, Avion avion, String villeDep, String villeArr , GregorianCalendar hDep, GregorianCalendar hArr, int ident) {
		Vol vol1 = new Vol(pilote, avion, villeDep, villeArr , hDep, hArr);
		vol1.setNumVol(ident);
		VolDAO volDAO1 = new VolDAO();
		System.out.println(volDAO1.update(vol1));
		Connexion.fermer();
	}

	private static void deleteVol(Pilote pilote, Avion avion, String villeDep, String villeArr , GregorianCalendar hDep, GregorianCalendar hArr, int ident) {
		Vol vol1 = new Vol(pilote, avion, villeDep, villeArr , hDep, hArr);
		vol1.setNumVol(ident);
		VolDAO volDAO1 = new VolDAO();
		System.out.println(volDAO1.delete(vol1));
		Connexion.fermer();
	}

	private static void createVol(Pilote pilote, Avion avion, String villeDep, String villeArr , GregorianCalendar hDep, GregorianCalendar hArr) {
		Vol vol1 = new Vol(pilote, avion, villeDep, villeArr , hDep, hArr);
		VolDAO volDAO1 = new VolDAO();
		System.out.println(volDAO1.create(vol1));
		Connexion.fermer();
	}

	private static void findAvion(int ident) {
		AvionDAO avionDAO = new AvionDAO();
		System.out.println(avionDAO.find(ident));
		Connexion.fermer();
	}

	private static void updateAvion(String nom, int cap, String localite, int ident) {
		Avion avion1 = new Avion(nom,cap,localite);
		avion1.setNumAv(ident);
		AvionDAO avionDAO1 = new AvionDAO();
		System.out.println(avionDAO1.update(avion1));
		Connexion.fermer();
	}

	private static void deleteAvion(String nom, int cap, String localite, int ident) {
		Avion avion1 = new Avion(nom,cap,localite);
		avion1.setNumAv(ident);
		AvionDAO avionDAO1 = new AvionDAO();
		System.out.println(avionDAO1.delete(avion1));
		Connexion.fermer();
	}

	private static void createAvion(String nom, int cap, String localite) {
		Avion avion1 = new Avion(nom,cap,localite);
		AvionDAO avionDAO1 = new AvionDAO();
		System.out.println(avionDAO1.create(avion1));
		Connexion.fermer();
	}

	private static void findPilote(int ident) {
		PiloteDAO piloteDAO = new PiloteDAO();
		System.out.println(piloteDAO.find(ident));
		Connexion.fermer();
	}

	private static void updatePilote(String nom, String ville, int salaire, int ident) {
		Pilote pilote1 = new Pilote(nom,ville,salaire);
		pilote1.setNumPil(ident);
		PiloteDAO piloteDAO1 = new PiloteDAO();
		System.out.println(piloteDAO1.update(pilote1));
		Connexion.fermer();
	}

	private static void deletePilote(String nom, String ville, int salaire, int ident) {
		Pilote pilote1 = new Pilote(nom,ville,salaire);
		pilote1.setNumPil(ident);
		PiloteDAO piloteDAO1 = new PiloteDAO();
		System.out.println(piloteDAO1.delete(pilote1));
		Connexion.fermer();
	}

	private static void createPilote(String nom, String ville, int salaire) {
		Pilote pilote1 = new Pilote(nom,ville,salaire);
		PiloteDAO piloteDAO1 = new PiloteDAO();
		System.out.println(piloteDAO1.create(pilote1));
		Connexion.fermer();
	}

	private static void initialisation() {
		Connexion.executeUpdate("DROP TABLE VOL;");
		Connexion.executeUpdate("DROP TABLE PILOTE;");
		Connexion.executeUpdate("DROP TABLE AVION;");
		String requeteCreateTablePilote = "CREATE TABLE PILOTE\r\n" + 
				"	(numPil int IDENTITY(1,1) PRIMARY KEY not NULL,\r\n" + 
				"	nomPil varchar(100) not NULL,\r\n" + 
				"	adr varchar(100) not NULL,\r\n" + 
				"	sal int not NULL);";
		Connexion.executeUpdate(requeteCreateTablePilote);
		String requeteInsertTuplePilote = "INSERT INTO PILOTE (nomPil,adr,sal)\r\n" + 
				"VALUES ('Jean','Nantes','15000'),\r\n" + 
				"('Mat','Rennes','13000'),\r\n" + 
				"('Obi-Wan','Nice','30000'),\r\n" + 
				"('Deckard','Vannes','20000'),\r\n" + 
				"('Dupont','Nice','10000'),\r\n" + 
				"('Durand','Paris','25000'),\r\n" + 
				"('Alain','Paris','17000'),\r\n" + 
				"('Dupont','Marseille','19000'),\r\n" + 
				"('Dupont','Nice','21000');";
		Connexion.executeUpdate(requeteInsertTuplePilote);
		String requeteCreateTableAvion = "CREATE TABLE AVION\r\n" + 
				"	(numAv int IDENTITY(1,1) PRIMARY KEY not NULL,\r\n" + 
				"	nomAv varchar(100) not NULL,\r\n" + 
				"	capacite int not NULL,\r\n" + 
				"	loc varchar(100)not NULL);";
		Connexion.executeUpdate(requeteCreateTableAvion);
		String requeteInsertTupleAvion = "INSERT INTO AVION (nomAv,capacite,loc)\r\n" + 
				"VALUES ('airbus','250','Paris'),\r\n" + 
				"('boeing','350','Nice'),\r\n" + 
				"('airbus','200','La Roche sur Yon'),\r\n" + 
				"('boeing','400','Nantes'),\r\n" + 
				"('airbus','370','Vannes'),\r\n" + 
				"('airbus','340','Rennes'),\r\n" + 
				"('boeing','300','Paris');";
		Connexion.executeUpdate(requeteInsertTupleAvion);
		String requeteCreateTableVol = "CREATE TABLE VOL\r\n" + 
				"	(numVol int IDENTITY(1,1) PRIMARY KEY not NULL,\r\n" + 
				"	numPil int FOREIGN KEY REFERENCES PILOTE(numPil) not NULL,\r\n" + 
				"	numAv int FOREIGN KEY REFERENCES AVION(numAv) not NULL,\r\n" + 
				"	villeDep varchar(100) not NULL,\r\n" + 
				"	villeArr varchar(100) not NULL,\r\n" + 
				"	hDep datetime not NULL,\r\n" + 
				"	hArr datetime not NULL);";
		Connexion.executeUpdate(requeteCreateTableVol);
		String requeteInsertTupleVol = "INSERT INTO VOL (numPil,numAv,villeDep,villeArr,hDep,hArr)\r\n" + 
				"VALUES ('1','3','Nice','Paris','2017-10-3 14:30:00','2017-10-3 16:30:00'),\r\n" + 
				"('2','5','Rennes','Paris','2017-10-3 12:00:00','2017-10-3 12:45:00'),\r\n" + 
				"('6','1','Paris','Nice','2017-10-3 18:00:00','2017-10-3 20:00:00'),\r\n" + 
				"('4','2','Vannes','Paris','2017-10-3 22:00:00','2017-10-3 23:00:00'),\r\n" + 
				"('5','4','Rennes','Nice','2017-10-3 21:00:00','2017-10-3 22:45:00'),\r\n" + 
				"('3','2','Nantes','Vannes','2017-10-10 08:35:00','2017-10-10 09:05:00'),\r\n" + 
				"('2','3','Vannes','La Roche sur Yon','2017-10-3 09:30:00','2017-10-3 10:00:00'),\r\n" + 
				"('1','2','Paris','Rennes','2017-10-3 09:30:00','2017-10-3 10:45:00'),\r\n" + 
				"('3','6','Nice','Paris','2017-10-3 20:30:00','2017-10-3 21:50:00'),\r\n" + 
				"('5','3','Paris','Nantes','2017-10-3 10:30:00','2017-10-3 11:30:00'),\r\n" + 
				"('1','2','Nantes','Nice','2017-10-3 11:35:00','2017-10-3 12:35:00'),\r\n" + 
				"('7','5','Nice','Renne','2017-10-3 12:05:00','2017-10-3 12:50:00'),\r\n" + 
				"('5','1','Vannes','Nice','2017-10-3 12:10:00','2017-10-3 13:10:00'),\r\n" + 
				"('6','3','Rennes','Nantes','2017-10-10 08:30:00','2017-10-10 09:00:00');";
		Connexion.executeUpdate(requeteInsertTupleVol);
		Connexion.fermer();
	}

}
