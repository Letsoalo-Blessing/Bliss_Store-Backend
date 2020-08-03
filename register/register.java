public class register {

    private String username;
    private String email;
    private String password;

    //default constructors
    public register() {
		
        username=email=password="";
 
    }

    //Overloaded constructor
    public register(String username, String email, String password) {
		
        setUsername(username);
        setEmail(email);
        setPassword(password);

    }

    //getters
    public String getUsername() {
		
        return username;
    }

    public String getEmail() {
		
        return email;
    }

    public double getPassword() {
		
        return password;
    }

   
    //setters
    public void setUsername(String username) {
		
        this.username = username;
    }

    public void setEmail(String email) {

        this.email = email;
    }

    public void setPassword(String password) {

        this.password = password;
    }

   

  

    @Override
    public String toString() {
        return +username + "\t\t" + email + "\t\t" + password;
    }

   
}
