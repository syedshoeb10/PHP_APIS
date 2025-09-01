<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && !empty($data['id'])) {
    $id = (int)$data['id'];

    include "config.php";

    $sql = "DELETE FROM ractice WHERE id = {$id}";

    if (mysqli_query($conn, $sql)) {
        echo json_encode([
            "message" => "record deleted",
            "status"  => true
        ]);
    } else {
        echo json_encode([
            "message" => "delete failed",
            "status"  => false,
            "error"   => mysqli_error($conn)
        ]);
    }
} else {
    echo json_encode([
        "message" => "Invalid ID",
        "status"  => false
    ]);
}
?>
