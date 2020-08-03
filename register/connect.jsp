<%@ page import ="java.sql.*"%>
<%
		String connectionURL = "jdbc:mysql://localhost:3306/projectdb";
		Connection connection = null;
		PreparedStatement ps = null;

		String username=request.getParameter("username");
		String password=request.getParameter("pass1");
		String email=request.getParameter("email");

int updateQuery = 0;
try{
	Class.forName("com.mysql.jdbc.Driver");
	connection = DriverManager.getConnection(connectionURL,"root","");
	
	String sql="INSERT INTO tbladmin(username,email,password) VALUES(?,?,?)";

	ps=connection.prepareStatement(sql);
	ps.setString(1,username);
	ps.setString(2,email);
	ps.setString(3,password);
	
	
	updateQuery=ps.executeUpdate();

	if(updateQuery > 0){
		out.println("Registration done successfully");
	}else{
		out.println("Registration Failed");
	}
} catch (ClassNotFoundException e) {

            
			out.println("Database is missing\n"+e);

}catch(Exception e){
	out.println(e);
}
%>