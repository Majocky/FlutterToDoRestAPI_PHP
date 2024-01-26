<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");
$con=mysqli_connect("localhost","root","","noteddb");
if ($con->connect_error) {
    $response = array(
        'success' => false,
        'message' => 'Connection failed: ' . $con->connect_error
    );
} else {
    // $response = array(
    //     'success' => true,
    //     'message' => 'Connection successful'
    // );
}

// Close the database connection

// Output the response as JSON
//header('Content-Type: application/json');
//echo json_encode($response);
?>