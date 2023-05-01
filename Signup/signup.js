let timeout;
let password = document.getElementById('PassEntry');
let strengthBadge = document.getElementById('result');
let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')


function StrengthChecker(PasswordParameter) {debugger
    if(strongPassword.test(PasswordParameter)) {
        document.getElementById("result").innerHTML="At least one Upper and one lower letter and one number";
    } else if(mediumPassword.test(PasswordParameter)) {
        document.getElementById("result").innerHTML="password is medium add some character and number";
    } else {
        document.getElementById("result").innerHTML=" password is weak please Add strong password";
    }
}

password.addEventListener("input", () => {
    strengthBadge.style.display = 'block';
    clearTimeout(timeout);
    timeout = setTimeout(() => StrengthChecker(password.value), 500);
    if(password.value.length !== 0) {
        strengthBadge.style.display != 'block';
    } else {
        strengthBadge.style.display = 'none';
    }
});







function validation(){
    if(document.Formfill.Username.value==""){
        document.getElementById("result").innerHTML="Enter Username*";
        return false;
    }
    if(document.Formfill.Username.value.length < 6){
        document.getElementById("result").innerHTML="At least six letter";
        return false;
    }
    if(document.Formfill.Email.value==""){
        document.getElementById("result").innerHTML="Enter your Email*";
        return false;
    }
    if(document.Formfill.Password.value==""){
        document.getElementById("result").innerHTML="Enter your Password*";
        return false;
    }
    
    if(document.Formfill.Password.value.length < 8){
        document.getElementById("result").innerHTML="Password must be 8-digits";
        return false;
    }
    /*if(document.Formfill.Password.value != /^(?=.*[a-z])(?=.*[A-Z]).+$/){debugger
        document.getElementById("result").innerHTML="At least one Upper and one lower letter";
        return false;  
    }
    if(document.Formfill.Password.value != /[0-9]/g){
          document.getElementById("result").innerHTML="Password must be at least one number";
          return false;  
    }*/
    
    if(document.Formfill.CPassword.value==""){
        document.getElementById("result").innerHTML="Enter Confirm Password*";
        return false;
    }

    if(document.Formfill.CPassword.value !== document.Formfill.Password.value){
        document.getElementById("result").innerHTML="Password does'nt match";
        return false;
    }

    return true;
    
}

  




