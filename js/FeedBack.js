function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var nameError = document.getElementById('nameError');
    var emailError = document.getElementById('emailError');
    
    // Clear previous error messages
    nameError.textContent = "";
    emailError.textContent = "";
    
    var isValid = true;
    
    // Name validation
    if (!name) {
    nameError.textContent = "Please Enter Your Name.";
    isValid = false;
    } else if (name.length < 2 || name.length > 50) {
    nameError.textContent = "Name should be between 2 and 50 characters.";
    isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(name)) {
    nameError.textContent = "Please enter a valid name. Special characters and numbers are not allowed.";
    isValid = false;
    }
    
    // Email validation
    if (!email) {
    emailError.textContent = "Please Enter Your Email.";
    isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    emailError.textContent = "Please enter a valid email address.";
    isValid = false;
    } else if (email.length > 100) {
    emailError.textContent = "Email should not exceed 100 characters.";
    isValid = false;
    }
    
    return isValid;
    }