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
