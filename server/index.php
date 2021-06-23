<?php
session_start();
print_r($_SESSION);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION</title>
</head>
<body>
    <h1>Registration Form</h1>
        <form action="connect.php" method="POST">
            <label for="UserName">User_Name</label>
            <input type="text" name="UserName" id="UserName" />

            <?php if($_SESSION["UserName"] == "blank") { ?>
            <span>This field is blank</span>
            <?php } ?>
            <br />
            <br />

            <label for="email">email</label>
            <input type="email" name="email" placeholder="abc@email.com" />
            <?php if($_SESSION["email"] == "blank") { ?>
            <span>This field is blank</span>
            <?php } ?>
            <br />
            <br />
            <label for="MobileNo">Mobile_No</label>
            <input type="text" name="MobileNo" id="MobileNo">
            <?php if($_SESSION["MobileNo"] == "blank") { ?>
            <span>This field is blank</span>
            <?php } ?>
            <br>
            <br>
            <br>
            <p id="interest">Gender</p>
            <input for="Male" type="radio" name="Gender" value="Male"  />Male
            <input for="Female" type="radio" name="Gender" value="Female"  />Female
            <input for="Others" type="radio" name="Gender" value="Others"  />Others
            <?php if($_SESSION["Gender"] == "blank") { ?>
            <span>This field is blank</span>
            <?php } ?>
            <br>
            <br>
            <br>
            <button type="submit">Submit Here</button>

            <?php
                session_destroy();
            ?>
        </form>
</body>
</html>