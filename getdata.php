<?php
include("conn.php");
// $json_data = file_get_contents('php://input');
// $data = json_decode($json_data, true);
$username = $_POST['username'];
//  $username = isset($data['username']) ? $data['username'] : '';

$query="select * from notestable where UserCreated='".$username."'";
$run=mysqli_query($con,$query);
$data=array();
while($row=mysqli_fetch_assoc($run)){
    $data[]=$row;
}
echo json_encode($data);
?>