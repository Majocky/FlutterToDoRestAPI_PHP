<?php 
include("conn.php");

$topic = $_POST['topic'];
$note = $_POST['note'];
$UserCreated = $_POST['UserCreated'];
$datecreated = $_POST['datecreated'];

// Convert the date string to a timestamp using strtotime
$datecreated_timestamp = strtotime($datecreated);

// Format the timestamp as a MySQL-compatible date
$formatted_date = date("Y-m-d H:i:s", $datecreated_timestamp);

$query = "INSERT INTO notestable (topic, note, datecreated, UserCreated) VALUES ('$topic', '$note', '$formatted_date', '$UserCreated')";
$run = mysqli_query($con, $query);

if ($run) {
    $response = array(
        'success' => true,
        'message' => 'Added successful'
    );
} else {
    $response = array(
        'success' => false,
        'message' => 'Failed to save'
    );
}

header('Content-Type: application/json');
echo json_encode($response);
?>
