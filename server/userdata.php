<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>HTML Table</h2>

<table>
  <tr>
    <th>User Name</th>
    <th>Email</th>
    <th>Mobile Num</th>
    <th>Gender</th>
    <th>Update</th>
    <th>Delete</th>
  </tr>

<?php
    $conn = new mysqli('localhost','root','','index');
    if($conn->connect_error){
         die('connection failed : ' .$conn->connect_error);
    }else{
        
        $sql = "SELECT * FROM registration";
        $result = $conn-> query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $url = "http://localhost/server/delete.php?user_name=".$row['User_name'];
    
    ?>
    <tr>
    <td><?php echo $row['User_name'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php echo $row['MobileNum'];?></td>
    <td><?php echo $row['Gender'];?></td>
    <td><a href="<?php echo 'http://localhost/server/update.php?user_name='.$row['User_name']?>">Update <?php echo $row['User_name'];?></a></td>
    <td><a href="<?php echo $url ?>">Delete <?php echo $row['User_name'];?></a></td>
  </tr>
  <?php }
} else {
  echo "0 results";
}
$conn->close();
    }
?>

</table>

</body>
</html>