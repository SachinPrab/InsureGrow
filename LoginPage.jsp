<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.sql.PreparedStatement" %>
<%@ page import="java.sql.Connection" %>
<%@ page import="java.sql.DriverManager" %>
<%@ page import="org.apache.commons.lang3.StringUtils" %>
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
        a:hover{
        color:red;
        }
            </style>
</head>
<body>
    <center>
        <p>Welcome To InsureGrow</p>
        <form method = "POST" action="dashboard.jsp">
        <center>
        <label for = "username"> Username </label> <input type="text" name = "username"><br><br>
        <label for = "password"> Password </label> <input type ="password" name = "password"><br><br>
    Remember Me <input type = "checkbox"><br><br>
        <input type="Submit" placeholder="Login"><br><br>
    </center>
    </form>
     <center>
     <a href = ""> Forgot Password? </a><br><br>
      <a href = "SignUp.html"> Don't have an account? Click here to sign up for InsureGrow.</a><br><br>
        </center>
    <%
        String u = request.getParameter("username");
        String p = request.getParameter("password");

        // Check if the 'username' parameter is null or empty
        if (StringUtils.isBlank(u)) {
            // Handle the error
            // ...
        } else {
            try {
                Class.forName("com.mysql.jdbc.Driver");
                Connection con=DriverManager.getConnection("jdbc:mysql://localhost:3306/signupdb","root","");
                String sql="INSERT INTO login(username,password) values(?,?)";
                PreparedStatement pstmt = con.prepareStatement(sql);
                pstmt.setString(1, u);
                pstmt.setString(2, p);
                int r = pstmt.executeUpdate();
                if(r > 0) {
                    out.println("Welcome to InsureGrow. Please click <a href='homepage.html'>here</a> to continue.");
                } else {
                    out.println("User details have not been added");
                }
                con.close();
            } catch(Exception e){
                out.println(e);
            }
        }
    %>
</body>
</html>
