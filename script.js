function validateForm() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username.trim() === "" || password.trim() === "") {
        alert("Username and password cannot be empty!");
        return false;
    }
    
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    return true;
}
