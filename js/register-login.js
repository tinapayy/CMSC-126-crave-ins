function register(){
  // Get the email and password input values
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  if (email && password) {
      //Storing Data:
      localStorage.setItem("email", email);
      localStorage.setItem("password", password);

      // Redirect to the login HTML file
      window.location.assign("login.html");
      alert("Registration Successful");
      
    } else {
      // Show an error message if the email or password are empty
      alert("Please enter your email and password.");
      return;
    }
}

function login(){
    //Retrieving Data:
    const savedEmail = localStorage.getItem("email");
    var savedPasswrd = localStorage.getItem("password");

    //Retrieving Data:
    var email = document.getElementById("email").value;
    var pword = document.getElementById("password").value;

    //Checking Data:
    if (email && password) {
        if(email == savedEmail && pword == savedPasswrd){
        // Redirect to the home HTML file
        window.location.assign("home.html");
        alert("Login Successful");
      } else {
        // Show an error message if the email or password are empty
        alert("Login Failed");
        return;
      }
    } else {
      // Show an error message if the email or password are empty
      alert("Please enter your email and password.");
      return;
    }
}  