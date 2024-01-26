<?php
include("conn.php");
// $json_data = file_get_contents('php://input');
// $data = json_decode($json_data, true);

// $username = isset($data['username']) ? $data['username'] : '';
// $password = isset($data['password']) ? $data['password'] : '';
$username=$_POST['username'];
$password=$_POST['password'];

$boolISuserExist="select Username,password from users where Username='".$username."' and password='".$password."'";
$qr=mysqli_query($con,$boolISuserExist);
if(mysqli_num_rows($qr)>0){
    $response = array(
        'success' => true,
        'message' => 'Successfully Logged In'
    );
}else{
    $response = array(
        'success' => false,
        'message' => 'Failed Logged In'
    );
}
header('Content-Type: application/json');
echo json_encode($response);
?>