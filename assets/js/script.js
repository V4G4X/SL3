function validate() {
    let tag = document.getElementsByClassName("required");

    var fname = document.forms["personalDetails"]["fName"];
    if (fname.value === "") {
        fname.value = prompt("Please Enter First Name");
        tag[0].innerHTML = "*Required";
        return false;
    }
    else{tag[0].innerHTML = "*";}

    var lname = document.forms["personalDetails"]["lName"];
    if (lname.value === "") {
        lname.value = prompt("Please Enter Last Name");
        tag[1].innerHTML = "*Required";
        return false;
    }
    else {tag[1].innerHTML = "*";}

    let num = document.forms["personalDetails"]["number"];
    if (num.value === "") {
        alert("Please Enter your Phone Number");
        tag[2].innerHTML = "*Required";
        return false;
    }
    else {tag[2].innerHTML = "*";}
    
    var email = document.forms["personalDetails"]["emailId"];
    if (email.value === "") {
        email.value = prompt("Please Enter Email");
        tag[3].innerHTML = "*Required";
        return false;
    }
    else {tag[3].innerHTML = "*";}
}