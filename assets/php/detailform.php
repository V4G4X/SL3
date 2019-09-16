<?php
echo "Current php Script is: ";
echo htmlspecialchars($_SERVER["PHP_SELF"]);
$fName = $lName = $phone = $email = $website = "";
$fNameErr = $lNameErr = $phoneErr = $emailErr = $websiteErr = $urlHeader = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fName = test_input($_POST["fName"]);
    if (empty($fName)) {
        $fNameErr = "Empty First Name Field ";
    }

    $lName = test_input($_POST["lName"]);
    if (empty($lName)) {
        $lNameErr = "Empty last Name Field ";
    }

    $phone = test_input($_POST["number"]);
    if(!is_numeric($phone)){
        $phoneErr="Invalid Phone Number ";
        if (empty($phone)) {
            $phoneErr = "Empty Phone Number Field ";
        }
    }

    $email = test_input($_POST["emailId"]);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid Email Format ";
    }
    if (empty($email)) {
        $emailErr = "Empty Email Field ";
    }

    $website = test_input($_POST["url"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
        $websiteErr = "Invalid URL Format ";
        if (empty($website)) {
            $websiteErr = "Empty URL Field ";
        }
    }
    else {
        $urlHeader = @get_headers($website);
        if (!$urlHeader || strpos($urlHeader,"404")) {
            $websiteErr = "URL doesn't Exist ";
        } else {
            $websiteErr = "URL Exists ";
        }
        
    }

}



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<html>
<body>
<br>
Welcome <?php echo $fName;?> <?php echo $lName;?><br>
Your Phone Number is: <?php echo $phone ?><br>
Your email address is: <?php echo $email; ?><br>
Your Website is: <?php echo $website?><br>

<?php echo $lNameErr?>
<?php echo $fNameErr?>
<?php echo $emailErr?>
<?php echo $websiteErr?>
<?php echo $phoneErr?>


</body>
</html>