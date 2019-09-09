function validate() {
    var fname = document.forms["personalDetails"]["fName"];
    if (fname.value===""){
        fname.value = prompt("Please Enter First Name");
        return false;
    }

    var lname = document.forms["personalDetails"]["lName"];
    if(lname.value===""){
        lname.value = prompt("Please Enter Last Name");
        return false;
    }

    var email = document.forms["personalDetails"]["emailId"];
    if(email.value===""){
        email.value = prompt("Please Enter Email");
        for (let index = 0; index < email.value; index++) {
            let element = email.value[index];
            if (element==='@') {
                return true;
            }
        }
        return false;
    }

    let date = document.forms["personalDetails"]["dob"];
    if (date.value==="") {
        alert("Please Enter your Date of Birth");
        return false;
    }

    let num = document.forms["personalDetails"]["number"].value;
    if(num===""){
        alert("Please Enter your Phone Number");
        return false;
    }
}