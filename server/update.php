<?php
    $conn = new mysqli('localhost','root','','index');
    $user_name  = $_REQUEST['user_name'];

    if($conn->connect_error){
        die('connection failed : ' .$conn->connect_error);
    }else{
   $sql = "SELECT * from registration WHERE User_name = '$user_name'";
   $result = $conn-> query($sql);
   $row = $result->fetch_assoc();
    $UserName = $row['User_name'];
    $email = $row['email'];
    $MobileNo = $row['MobileNum'];
    $Gender = $row['Gender'];
    }



?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
<style> 
        .inputClass { 
            pointer-events: none;  
        } 
        </style> 

</head>
<body>
    <?php 
            if(isset($_POST['update'])){
                updateData();
            }
            
            ?>
    <form method="POST">
            <label for="UserName">User_Name</label>
            <input type="text" name="UserName" class="inputClass" value="<?php echo $UserName ?>"/>
            <br />
            <br />
            <label for="email">email</label>
            <input type="email" name="email" value="<?php echo $email ?>"/>
            <br />
            <br />
            <label for="MobileNo">Mobile_No</label>
            <input type="text" name="MobileNo" value="<?php echo $MobileNo ?>">
            <br>
            <br>
            <p id="interest">Gender</p>
            
            <input for="Male" type="radio" name="Gender" value="Male" <?php if($Gender=="Male") { echo "checked"; } ?>  />Male
            <input for="Female" type="radio" name="Gender" value="Female" <?php if($Gender=="Female") { echo "checked"; } ?> />Female
            <input for="Others" type="radio" name="Gender" value="Others" <?php if($Gender=="Others") { echo "checked"; } ?> />Others
            <br>
            <br>
            <button type='submit'  name='update'>Update Here</button>
    </form>
</body>
</html>


<?php
function updateData(){



    $UserName = $_POST['UserName'];
    $email2 = $_POST['email'];
    $MobileNo2 = $_POST['MobileNo'];
    $Gender2 = $_POST['Gender'];
        $conn = new mysqli('localhost','root','','index');
        if($conn->connect_error){
            die('connection failed : ' .$conn->connect_error);
        }else{
        $sql = "UPDATE registration SET email= '$email2', MobileNum= '$MobileNo2', Gender= '$Gender2' WHERE User_name = '$UserName'";

        if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
            header("Location: http://localhost/server/userdata.php"); 

        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

}
}
?>