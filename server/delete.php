
<?php

$user_name  = $_REQUEST['user_name'];

$conn = new mysqli('localhost','root','','index');

if($conn->connect_error){
        die('connection failed : ' .$conn->connect_error);
    }else{
        $sql = "DELETE FROM registration WHERE User_name = '$user_name'";

        if ($conn->query($sql) === TRUE) {
        echo $user_name." deleted successfully";
        header("Location: http://localhost/server/userdata.php"); 
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();

    }

?>
    