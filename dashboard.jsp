<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@ page import="java.sql.PreparedStatement" %>
    <%@ page import="java.sql.Connection" %>
    <%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ page import="java.sql.DriverManager" %>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html>
<head>
<style>
  body {
 background-color: lightgrey; 
 border: 2px solid green;
    font-size: 20px;
    padding: 10px;
    margin: 20px;
  }
</style>
</head>
<body>
  <center>
    <p>Welcome To InsureGrow</p>
  </center>
  <%
    String u = "";
    String p = "";
    u = request.getParameter("username");
    p = request.getParameter("password");
    try {
        Class.forName("com.mysql.jdbc.Driver");
        Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/signupdb","root","");
        String sql="INSERT INTO login(username,password) values(?,?)";
        PreparedStatement pstmt = con.prepareStatement(sql);
        pstmt.setString(1, u);
        pstmt.setString(2, p);
        int r = pstmt.executeUpdate();
        if(r > 0)
        {
            out.println("Welcome to InsureGrow. Please click <a href='homepage.html'>here</a> to continue.");
        }
        else
        {
            out.println("User details have not been added");
        }
        con.close();
    }
    catch(Exception e){
        out.println(e);
    }
  %>
</body>
</html>
