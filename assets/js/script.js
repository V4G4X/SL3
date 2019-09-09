// alert("LALALALALA");

function validate() {
    var fname = document.forms["personalDetails"]["fName"];
    if (fname.value===""){
        alert("Please Enter First Name");
        return false;
    }

    var lname = document.forms["personalDetails"]["lName"];
    if(lname.value===""){
        alert("Please Enter Last Name");
        return false;
    }

}