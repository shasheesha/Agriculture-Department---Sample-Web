function signInFieldsValidate() {
    var username = document.forms["signIn"]["signin-username"].value;
    var password = document.forms["signIn"]["signin-password"].value;
    
    if (username == "") {
        if (password == "") {
        
            alert("Username & password fields are empty. Fill it and try again.");
            return false;
          } else{
            alert("Username field is empty. Fill it and try again.");
            return false;
          }
    } else if(password == ""){
        alert("Password field is empty. Fill it and try again.");
        return false;
    } else{
        signInDataValidate(username,password);
    }
  }
 function signInDataValidate(uname, upass){;
    db.query("SELECT * FROM `user` where userName ='"+ uname +"' AND userPassword ='"+ upass +"';", (err, results) => {
        if (err) { throw err; }
        console.log(results);
      });
 }