<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = json_decode(file_get_contents("php://input"),true);
$search_value = $data['search'];

// $search_value = isset($_GET['search']) ? $_GET('search') : die();
/* this function is used for search the result using get function */

include "config.php";

$sql = "SELECT * FROM ractice  WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("connection failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
} else {
    echo json_encode(["message" => "No record found"]);
}
?>

