function validateCreateStore(form) {
    var address = form['address'].value;
    var manager = form['manager'].value;
    var phoneNumber = form['phoneNumber'].value;      
    
    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }
    
    var errors = new Object();
    
    if (address === "") {
        errors["address"] = "Address cannot be empty\n";
    }
    if (manager === "") {
        errors["manager"] = "Manager cannot be empty\n";
    }
  
    if (phoneNumber === "") {
        errors["phoneNumber"] = "Phone Number cannot be empty\n";
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









