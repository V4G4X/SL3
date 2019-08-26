alert("LALALALALA");

function validate() {
    var fname = document.forms["personalDetails"]["fName"];
    // if(Document.personalDetails.fName.value === "") {
    if (fname.value===""){
        alert("Please Enter First Name");
        return false;
    }
    // if (Document.personalDetails.lName.value === "") {
    //     alert("Please Enter First Name");
    //     return false;
    // }
    // if (Document.personalDetails.number.value === "") {
    //     alert("Please Enter First Name");
    //     return false;
    // }
    // if (Document.personalDetails.emailId.value === "") {
    //     alert("Please Enter First Name");
    //     return false;
    // }

}