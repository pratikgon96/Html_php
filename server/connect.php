<?php
session_start();
?>
<?php

     //print_r($_REQUEST);

     $UserName = $_REQUEST['UserName'];
     $email = $_REQUEST['email'];
     $MobileNo = $_REQUEST['MobileNo'];
     $Gender = $_REQUEST['Gender'];
     if($UserName==""){
          $_SESSION["UserName"] = "blank";
     }
     if($email==""){
          $_SESSION["email"] = "blank";
     }
     if($MobileNo==""){
          $_SESSION["MobileNo"] = "blank";
     }
     if($Gender==""){
          $_SESSION["Gender"] = "blank";
     }

     //session_destroy();

     if($UserName !="" && $email!="" && $MobileNo!="" && $Gender!=""){


          echo "here i am";
     

     $conn = new mysqli('localhost','root','','index');
     if($conn->connect_error){
     die('connection failed : ' .$conn->connect_error);
     }else{

        //echo "Connected successfully";
     $sql = "INSERT INTO registration (User_name,email,MobileNum,Gender) VALUES ('$UserName', '$email','$MobileNo','$Gender')";

     if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
          header("Location: http://localhost/server/userdata.php");
     } else {

          
$findme   = 'PRIMARY';
$pos = strpos($conn->error, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {

          echo $conn->error;
}

else{
     echo $UserName." is already exist";
}


     } 
}


}
?>