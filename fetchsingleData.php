<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// $data = json_decode(file_get_contents("php://input"),true);
// $student_id = $data;

include "config.php";

$sql = "SELECT * FROM ractice ";
$result = mysqli_query($conn, $sql) or die("connection failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No record found"]);
}
?>
