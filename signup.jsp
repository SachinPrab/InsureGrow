<html>
  <head>
    <style>
      body {
        background-color: <%=backgroundColor%>;
        border: 2px solid <%=borderColor%>;
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
  </body>
</html>

<%
if (request.getMethod().equals("POST")) {
  // Get the form data
  String name = request.getParameter("name");
  String username = request.getParameter("username");
  String password = request.getParameter("password");
  String email = request.getParameter("email");
  String address = request.getParameter("address");
  String phoneNumber = request.getParameter("phone_number");
  String dateOfBirth = request.getParameter("date_of_birth");
  String occupation = request.getParameter("occupation");
  String annualIncome = request.getParameter("annual_income");
  
  // Insert the user data into the database
  Connection con = null;
  PreparedStatement pstmt = null;
  try {
    Class.forName("com.mysql.jdbc.Driver");
    con = DriverManager.getConnection("jdbc:mysql://localhost/signupdb", "root", "");
    String sql = "INSERT INTO signup(name, username, password, email, address, phone_number, date_of_birth, occupation, annual_income) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    pstmt = con.prepareStatement(sql);
    pstmt.setString(1, name);
    pstmt.setString(2, username);
    pstmt.setString(3, password);
    pstmt.setString(4, email);
    pstmt.setString(5, address);
    pstmt.setString(6, phoneNumber);
    pstmt.setString(7, dateOfBirth);
    pstmt.setString(8, occupation);
    pstmt.setString(9, annualIncome);
    int rowsAffected = pstmt.executeUpdate();
    if (rowsAffected > 0) {
      out.println("Thank you for registering with our website, " + name + ". Welcome to InsureGrow. Please click <a href='homepage.html'>here</a> to continue.");
    } else {
      out.println("User details have not been added in database");
    }
  } catch (ClassNotFoundException e) {
    out.println("Error: " + e.getMessage());
  } catch (SQLException e) {
    out.println("Error: " + e.getMessage());
  } finally {
    try {
      if (pstmt != null) pstmt.close();
      if (con != null) con.close();
    } catch (SQLException e) {
      out.println("Error: " + e.getMessage());
    }
  }
}
%>
