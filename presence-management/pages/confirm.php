<?php
require '../db/connection.php';

if (isset($_POST["choristeId"])) {
    $choristeId = $_POST['choristeId'];
    $SQL = "SELECT * FROM choriste  WHERE choristeId=$choristeId";

    $req = $PDO->query($SQL);

    $response = array();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $response = $data;
    }
    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = "Invalid or data not found";
}

?>