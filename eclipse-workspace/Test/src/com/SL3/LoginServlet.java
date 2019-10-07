package com.SL3;

import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class LoginServlet
 */
@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#HttpServlet()
	 */
	public LoginServlet() {
		super();
		// TODO Auto-generated constructor stub
	}

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String username = request.getParameter("username");
		username = username.trim();
		String password = request.getParameter("password");
		password = password.trim();
		if(username.isEmpty() || password.isEmpty()) {
			System.out.println("Username Empty");
			request.setAttribute("userError", "Please Enter Username");
			if(password.isEmpty()) {
				System.out.println("Password Empty");
				request.setAttribute("passError", "Please Enter Password");
				request.getRequestDispatcher("Index.jsp").forward(request, response);
				return;
			}
			request.getRequestDispatcher("Index.jsp").forward(request, response);
			return;
		}
		try {
			Connection con = DatabaseConnection.initializeDatabase();
			PreparedStatement st = con.prepareStatement("SELECT `password` FROM Login WHERE `username` LIKE ?");
			st.setString(1, username);
			ResultSet rs = st.executeQuery();
			if(!rs.next()) {
				System.out.println("Username not Found");
				request.setAttribute("userError", "Please Enter Valid Username");
				request.getRequestDispatcher("Index.jsp").forward(request, response);
				return;
			}else {
				String recPass = rs. getString("password");
				if (recPass.compareTo(password)==0) {//Passwords Match
					request.setAttribute("username", username);
					request.getRequestDispatcher("Profile.jsp").forward(request, response);
					return;
				}
				else {
					System.out.println("Password Incorrect");
					request.setAttribute("passError", "Please Enter Correct Password");
					request.getRequestDispatcher("Index.jsp").forward(request, response);
					return;
				}
			}
		} catch (Exception e) {
			System.out.println("Okay some Exception Caught in LoginServlet Block ");
			e.printStackTrace();
		}
		doGet(request, response);
	}
}
