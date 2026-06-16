let otp = null;

/* -----------------------------------
   PAGE SWITCHING
----------------------------------- */
function showPage(page) {
    ["home","adminLogin","signup","login","forgot"].forEach(id =>
        document.getElementById(id).classList.add("hide")
    );
    document.getElementById(page).classList.remove("hide");
}

/* -----------------------------------
   PHONE NUMBER FORMAT + VALIDATION
----------------------------------- */
function formatIndianPhone(input) {
    if (!input.value.startsWith("+91")) {
        input.value = "+91";
    }
    let digits = input.value.replace(/\D/g, "").substring(2, 12);
    input.value = "+91" + digits;
}

function isValidIndianNumber(phone) {
    return /^\+91[6-9][0-9]{9}$/.test(phone);
}

/* -----------------------------------
   FULL NAME VALIDATION (NO TRIM)
----------------------------------- */
function validateFullName(name) {

    // No empty name
    if (name.length === 0) 
        return "Full name cannot be empty";

    //Max length 35
    if(name.length>35) 
        return "Full name cannot exceed 35 characters";

    // No leading space
    if (name[0] === " ") 
        return "No leading spaces allowed";

    // No trailing space
    if (name[name.length - 1] === " ") 
        return "No trailing spaces allowed";

    // Only one space allowed in between
    //let spaceCount = (name.split(" ").length - 1);
    //if (spaceCount > 1) return false;
    
    // Letters and one space allowed
    //if (!/^[A-Za-z]+(?: [A-Za-z]+)?$/.test(name)) return false;

    // Allow maximum 2 spaces (3 words)
    let spaceCount = (name.split(" ").length - 1);
    if (spaceCount > 5) 
        return "Maximum 5 words allowed in full name";
    if (!/^[A-Za-z]+( [A-Za-z]+)*$/.test(name)) 
        return "Only alphabets are allowed and only one space between words are allowed";


    //one word uppercase and other lowercase
    //let first=parts[0];
    //let last=parts[1];
    //if((first===first.toUpperCase() && last===last.toLowerCase())|| first===first.toLowerCase() && last===last.toUpperCase()) return false;

    return "valid";
}

/* -----------------------------------
   EMAIL VALIDATION
----------------------------------- */
function validateEmail(email) {
    // Converts email into raw string representation to catch hidden leading spaces
    let raw = String(email);

    // Empty email
    if (raw.length === 0)
        return "Email cannot be empty";

    // Detect ANY leading whitespace manually
    if (/^[\s]/.test(raw)) 
        return "Email cannot start with spaces";

    // Detect ANY trailing whitespace manually
    if (/[\s]$/.test(raw)) 
        return "Email cannot end with spaces";

    // No uppercase letters
    if (/[A-Z]/.test(raw)) 
        return "Email must contain only lowercase letters";

    //No special characters allowed
    if (!/^[a-z0-9@.]+$/.test(raw)) 
        return "Only lowercase letters, numbers, @ and . are allowed";

    if (!/^[a-z0-9.]{3,}@gmail\.com$/.test(raw))
    return "Email must have at least 3 characters before @gmail.com";

    // Must end with gmail.com
    if (!raw.endsWith("gmail.com")) 
        return "Email must end with gmail.com";

    // Exactly one @
    if ((raw.match(/@/g) || []).length !== 1) 
        return "Email must contain exactly one @";

    // Must have at least one character before @
    if (/^@/.test(raw))
        return "Email must contain characters before @";

    // Dot cannot be first character
    if (raw[0] === ".")
        return "Email cannot start with a dot";

    // Dot cannot appear immediately before @
    if (/\.\@/.test(raw))
        return "Dot cannot appear before @";

    // Double dots not allowed
    if (/\.\./.test(raw))
        return "Email cannot contain consecutive dots";
    // Exactly one .
    //if ((raw.match(/\./g) || []).length !== 1) 
        //return "Email must contain exactly one .";

    // No spaces anywhere inside
    if (/\s/.test(raw)) 
        return "Email cannot contain spaces in middle";

    return "valid";
}

function validatePassword(pass) {

    // Empty password
    if (pass.length === 0)
        return "Password cannot be empty";

    // Leading space
    if (pass[0] === " ")
        return "Password cannot start with a space";

     // Trailing space
    if (pass[pass.length - 1] === " ")
        return "Password cannot end with a space";

    // No spaces
    if (/\s/.test(pass)) 
        return "Password cannot contain spaces";

    // Minimum length
    if (pass.length < 6)
        return "Password must be at least 6 characters long";

    // Must contain special character
    if (!/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(pass))
        return "Password must contain at least one special character";

    return "valid";
}

/* -----------------------------------
   USERNAME VALIDATION (NO TRIM)
----------------------------------- */
function validateUsername(username) {

    // Empty username
    if (username.length === 0)
        return "Username cannot be empty";

    // Leading space
    if (username[0] === " ")
        return "Username cannot start with a space";

    // Trailing space
    if (username[username.length - 1] === " ")
        return "Username cannot end with a space";

    // Spaces anywhere
    if (/\s/.test(username))
        return "Username cannot contain spaces";

    // Minimum length
    if (username.length < 6)
        return "Username must be at least 6 characters long";

    // Only letters and numbers allowed
    if (!/^[A-Za-z0-9]+$/.test(username))
        return "Username can contain only letters and numbers";

    // Must contain at least one digit
    if (!/[0-9]/.test(username))
        return "Username must contain at least one number";

    // Cannot be all digits
    if (/^[0-9]+$/.test(username))
        return "Username cannot contain only numbers";

    return "valid";
}

/* -----------------------------------
   ADMIN LOGIN
----------------------------------- */
function adminLogin() {
    let u = document.getElementById("adminUsername").value;
    let p = document.getElementById("adminPassword").value;

    if (u.length < 6) {
        alert("Username must be at least 6 characters long");
        return;
    }

    if (p.length < 6) {
        alert("Password must be at least 6 characters long");
        return;
    }

    if (u === "admin123" && p === "admin123") {
        alert("Admin Login Successful");
    } else {
        alert("Invalid admin username or password");
    }
}

/* -----------------------------------
   SIGNUP OTP
----------------------------------- */
function sendSignupOTP() {
    let phone = document.getElementById("signupPhone").value;

    if (!isValidIndianNumber(phone)) {
        alert("Enter a valid Indian phone number (+91 and 10 digits starting with 6-9)");
        return;
    }

    otp = Math.floor(100000 + Math.random() * 900000);
    alert("Your OTP is: " + otp);

    document.getElementById("signupOtpDiv").style.display = "block";
}

/* -----------------------------------
   SIGNUP PROCESS
----------------------------------- */
function signup() {
    let fullName = document.getElementById("fullname").value;
    let email = document.getElementById("signupEmail").value;
    let age = document.getElementById("signupAge").value;
    let gender = document.getElementById("signupGender").value;
    let username = document.getElementById("suUsername").value;
    let pass = document.getElementById("suPassword").value;
    let confirmPass = document.getElementById("suConfirmPassword").value;
    let phone = document.getElementById("signupPhone").value;
    let enteredOtp = document.getElementById("signupOtp").value;
    

    // FULL NAME VALIDATION
    let nameValidation = validateFullName(fullName);

    if (nameValidation !== "valid") {
        alert(nameValidation);
        return;
    }

    // EMAIL VALIDATION
    let emailValidation = validateEmail(email);

    if (emailValidation !== "valid") {
        alert(emailValidation);
        return;
    }

    //age validation
    if (age === " " || isNaN(age) || Number(age) < 10 || Number(age) > 100) {
        alert("Age should be greater than 10 and less than 100");
        return;
    }

    // GENDER CHECK (NEW)
    if (gender === "") {
        alert("Please select your gender");
        return;
    }

    // USERNAME VALIDATION
    let usernameValidation = validateUsername(username);

    if (usernameValidation !== "valid") {
        alert(usernameValidation);
        return;
    }

    //password validation
    let passwordValidation = validatePassword(pass);

    if (passwordValidation !== "valid") {
        alert(passwordValidation);
        return;
    }

    // PASSWORD MATCH
    if (pass !== confirmPass) {
        document.getElementById("passMsg").style.display = "block";
        alert("Passwords do not match");
        return;
    } else {
        document.getElementById("passMsg").style.display = "none";
    }

    // PHONE VALIDATION
    if (!isValidIndianNumber(phone)) {
        alert("Invalid Indian Phone Number");
        return;
    }

    // OTP check
    if (enteredOtp === "") {
        alert("Please enter OTP");
        return;
    }

    if (enteredOtp != otp) {
        alert("Invalid OTP");
        return;
    }

    //alert("Signup Successful!");
    fetch("signup.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams({
        fullname: fullName,
        email: email,
        age: age,
        gender: gender,
        username: username,
        password: pass,
        phone: phone
    })
})
.then(response => response.text())
.then(data => {

    if(data.trim() === "success"){
        alert("Signup Successful");
        showPage("login");
    }
    else{
        alert("Error saving data: " + data);
    }

});
}

/* -----------------------------------
   FORGOT PASSWORD OTP
----------------------------------- */
function sendForgotOTP() {
    let phone = document.getElementById("fphone").value;

    if (!isValidIndianNumber(phone)) {
        alert("Enter a valid Indian phone number (+91 and 10 digits starting with 6-9)");
        return;
    }

    otp = Math.floor(100000 + Math.random() * 900000);
    alert("Your OTP is: " + otp);

    document.getElementById("otpDiv").style.display = "block";
}

function verifyForgotOtp() {
    let enteredOtp = document.getElementById("forgotOtp").value;

    if (enteredOtp == otp) {
        alert("OTP Verified Successfully");
        document.getElementById("resetDiv").style.display = "block";
    } else {
        alert("Invalid OTP");
    }
}

/* -----------------------------------
   RESET PASSWORD
----------------------------------- */
function resetPassword() {
    let newpass = document.getElementById("newpass").value;
    let confirmpass = document.getElementById("confirmpass").value;

    if (newpass !== confirmpass) {
        alert("Passwords do not match");
        return;
    }

    if (newpass.length < 6) {
        alert("Password must be at least 6 characters");
        return;
    }

    alert("Password Reset Successfully!");
}

//login user
function loginUser(){

let user = document.getElementById("loginuser").value;
let pass = document.getElementById("loginpass").value;

if(user === "" || pass === ""){
    alert("Please enter username/email and password");
    return;
}

fetch("login.php",{
method:"POST",
headers:{
"Content-Type":"application/x-www-form-urlencoded"
},
body:new URLSearchParams({
loginuser:user,
password:pass
})
})
.then(response => response.text())
.then(data =>{

if(data.trim() === "Login Successful"){
alert("Login Successful");

// redirect to user dashboard
window.location.href = "login_dashboard.php";

}
else{
alert(data);
}

});

}