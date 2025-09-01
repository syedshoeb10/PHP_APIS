<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);

    $id    = $data['id'];
    $name  = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'];

    include "config.php";

$sql = "UPDATE ractice 
        SET name = '{$name}', email = '{$email}', phone = '{$phone}' 
        WHERE id = {$id}";

    if (mysqli_query($conn, $sql)) {
        echo json_encode([
            "message" => "record updated",
            "status"  => true
        ]);
    } else {
        echo json_encode([
            "message" => "update failed",
            "status"  => false
        ]);
    }
?>
