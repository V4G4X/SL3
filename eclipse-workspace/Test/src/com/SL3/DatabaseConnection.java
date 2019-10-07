package com.SL3;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DatabaseConnection {
	protected static Connection initializeDatabase() throws IOException, SQLException{
		String dbDriver = "com.mysql.cj.jdbc.Driver";
		String url = "jdbc:mysql://localhost:3306/";
		String dbName = "Login";
		String user = "Varun";
		String pass = "varun2003"; 
		try {
			Class.forName(dbDriver);
		} catch (Exception e) {
			System.out.println("Driver Error");
			e.printStackTrace();
		}
		try {
			Connection con = DriverManager.getConnection(url+dbName,user,pass);
			return con;
		} catch (Exception e) {
			System.out.println("Connection Error");
			e.printStackTrace();
		}
		return null;
	}
}
