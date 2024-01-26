<?php
include("conn.php");
$username=$_POST['username'];
$password=$_POST['password'];
$fullname=$_POST['fullname'];
$cpassword=$_POST['cpassword'];


$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// $username = isset($data['username']) ? $data['username'] : '';
// $password = isset($data['password']) ? $data['password'] : '';
// $fullname = isset($data['fullname']) ? $data['fullname'] : '';
// $cpassword = isset($data['cpassword']) ? $data['cpassword'] : '';

if($password !=$cpassword){
    $response = array(
        'success' => false,
        'message' => 'Passwords dont Match: '
    );
}else{
    $boolISuserExist="select Username from users where Username='".$username."'";
    $qr=mysqli_query($con,$boolISuserExist);
    if(mysqli_num_rows($qr)>0){
        $response = array(
            'success' => false,
            'message' => 'This Username ' . $username .   ' Exist'
        );
    }
    else{
        $q="insert into users (Username,password,FullName) values('".$username."','".$password."','".$fullname."')";
        $run =mysqli_query($con,$q);
        if($run){
            $response = array(
                'success' => true,
                'message' => 'Added successful'
            );
        }else{
            $response = array(
                'success' => false,
                'message' => 'Failed to save'
            );
        }
    }
}
header('Content-Type: application/json');
echo json_encode($response);
?>