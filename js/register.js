function validateRegistration(form) {      // function name which has been called in register.php
    var username = form['username'].value; //  asigning variables from the form and match their values
    var password = form['password'].value;
    var password2 = form['password2'].value;
    
    var spanElements = document.getElementsByClassName("error");   // loop which counts the numeber of r=errors and adds them
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }
    
    var errors = new Object();  // creation of errors as an object for the loop below
    
    if (username === "") {                                   // var username cannot be empty simple
        errors["username"] = "Username cannot be empty\n";   // if condition is met then error message will be printed
    }
    if (password === "") {
        errors["password"] = "Password cannot be empty\n";   // likewise for p1 and p2
    if (password2 === "") {
        errors["password2"] = "Password2 cannot be empty\n"; // meesage value for error
   
    }
    else if (password === password2) {
        errors["password2"] = "Passwords must match\n";
    }    
    var valid = true;
    for (var index in errors) { // loop for errors
        valid = false;
        var errorMessage = errors[index]; // shows errors as they appear on the index of the object errors
        var spanElement = document.getElementById(index + "Error"); // if the error exists their value will be shown
        spanElement.innerHTML = errorMessage; // script will run untill no errors exist
    }
    
    return valid;
}
}







