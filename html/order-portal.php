<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pizza Delivery Portal</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../assets/css/layout.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

    <script src="../assets/js/script.js"></script>
    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            width: 250px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown :hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
    <?php
        // echo "Current php Script is: ";
        // echo htmlspecialchars($_SERVER["PHP_SELF"]);
        $fName = $lName = $phone = $email = $website = "";
        $fNameErr = $lNameErr = $phoneErr = $emailErr = $websiteErr = $urlHeader = " ";
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
                if (!$urlHeader || strpos($urlHeader[0],"404")) {
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
</head>

<body>
    <header>
        <span>
            <strong><a class="page-title" href="../index.html">Mama Cha Pizza</a></strong>
        </span>
        <span>
            <a href="../index.html" class="logo-img-link">
                <img src="../assets/images/pizza_logo.png" alt="Logo" height="10%" width="10%" class="logo-img">
            </a>
        </span>
        <span>
            <p class="page-number">
                420-69-6969
            </p>
        </span>
        <br><br>
    </header>
    <ul class="navbar">
        <li><a href="../index.html">Home </a></li>
        <li><a href="about-us.html">Our Story </a></li>
        <li><a href="privacy-policy.html">Privacy Policy </a></li>
        <li><a href="terms-conditions.html">Terms and Conditions </a></li>
        <li class="navbar-active"><a href="order-portal.php">Order Pizza Online</a></li>
    </ul>
    <section class="text-container">
        <form name="personalDetails" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="//return validate();">
            <br>
            <fieldset class="input-personal">
                <legend>Enter Contact Details</legend>

                <label for="fName">First Name: </label>
                <input type="text" name="fName" placeholder="First Name">
                <span class="required">*<?php echo $fNameErr?></span>
                <br>
                <br>
                <label for="lName">Last Name: </label>
                <input type="text" name="lName" class="lName" placeholder="Last Name">
                <span class="required">*<?php echo $lNameErr?></span>
                <br>

                <br>
                <label for="number">Phone Number: </label>
                <input type="text" name="number" class="number" placeholder="Number" minlength="8" maxlength="10">
                <span class="required">*<?php echo $phoneErr?></span>
                <br>

                <br>
                <label for="url">Website: </label>
                <input type="text" name="url" placeholder="Website">
                <?php echo $websiteErr?>
                <br>

                <br>
                <label for="email">Email ID: </label>
                <input type="text" name="emailId" class="email" placeholder="Email ID">
                <span class="required">*<?php echo $emailErr?></span>
                <br>

                <br>
                <label for="dob">Enter Birthdate(For a Special Surprise on your BDay): </label>
                <input type="date" name="dob" class="dob">
                <br>

                <br>
                <input type="submit" name="submit" value="Submit">
            </fieldset>
            <br>
            <!-- <fieldset>
                <legend>Create Password</legend>
                <label for="enterPassword">Enter Password</label>
                <input type="password" name="Enter Password" class="enterPassword" placeholder="Enter Password" /><br>
                <br>
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="Confirm Password" class="confirmPassword" placeholder="Confirm Password" />
                <br>
            </fieldset> -->
        </form>
        <br>

        <form class="cartAdder">
            <fieldset class="input-order">
                <legend>Add your orders to the menu:</legend>
                <div class="dropdown">
                    <select name="pizza-category" class="dropbtn">
                        <option value="classic">Classic</option>
                        <option value="supreme">Supreme</option>
                        <option value="cheeseburst">Cheese Burst</option>
                        <option value="combos">Combos</option>
                        <option value="partyPacks">Party Packs</option>
                        <option value="cheesyDips">Cheesy Dips</option>
                        <option value="sides">Sides</option>
                        <option value="desserts">Desserts</option>

                    </select>

                    <br>

                    <br>

                    <select name="pizza-model" class="dropbtn">
                        <option value="sasta">"Mai Gareeb hu" Pizza</option>
                        <option value="verySasta">"Bahut Gareeb hu" Pizza</option>
                        <option value="pricey">"Mera naam Ambani" Pizza</option>
                    </select>
                    <br>
                    <br>

                    <select name="pizza-size" class="dropbtn">
                        <option value="regular">Regular (Feeds 1)</option>
                        <option value="medium">Medium (Feeds 2)</option>
                        <option value="large">Large (Feeds 4)</option>
                        <option value="vBig">World Record Size (Feeds all of Africa)</option>
                    </select>
                    <br>
                </div>
                <br>
                <br>

                <input type="checkbox" name="Pepperoni">Pepperoni <br>
                <input type="checkbox" name="Mushrooms">Mushrooms <br>
                <input type="checkbox" name="Onions">Onions <br>
                <input type="checkbox" name="Sausage">Sausage <br>
                <input type="checkbox" name="Extra cheese">Extra cheese <br>
                <input type="checkbox" name="Black olives">Black olives <br>
                <input type="checkbox" name="Green peppers">Green peppers <br>
                <input type="checkbox" name="Spinach">Spinach <br>
                <br>
                <button type="button">Add to Cart</button>
            </fieldset>
        </form>
        <br>

        <form class="addressDetails">
            <fieldset class="input-address">
                <legend>Address Details</legend>
                <label for="address">Address: </label>
                <input type="test" name="Address" class="address" placeholder="Address" />
                <label for="pincode">Pin Code: </label>
                <input type="number" name="pincode" class="pincode" placeholder="Pin Code" minlength="6"
                    maxlength="6" />
                <br>
                <label for="city">City: </label>
                <input type="text" name="city" placeholder="City" />
                <label for="state">Address: </label>
                <input type="text" name="State" class="state" placeholder="State" /><br>
                <br>
                <input type="radio" name="delivery" value="pickup">Pickup<br>
                <input type="radio" name="delivery" value="delivery">Delivery<br>
            </fieldset>
        </form>
    </section>


    <footer>
        <ul class="navbar">
            <li><a href="../index.html">Home </a></li>
            <li><a href="../html/about-us.html">Our Story </a></li>
            <li><a href="../html/privacy-policy.html">Privacy Policy </a></li>
            <li><a href="../html/terms-conditions.html">Terms and Conditions </a></li>
            <li class="navbar-active"><a href="../html/order-portal.php">Order Pizza online</a></li>
        </ul>
        <h5 style="color: white">2019 @ Mama cha Pizza. No rights reserved</h5>
    </footer>
</body>