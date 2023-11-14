<?php
require '../db/connection.php';
require '../config/utils.php';
init_php_session();
is_logged();

$choristeId = $_GET['choristeId'];

$SQL = 'DELETE FROM choriste WHERE choristeId = :choristeId';
$req = $PDO->prepare($SQL);
$req->bindParam(":choristeId",$choristeId);


if($req->execute() === TRUE ){

    header("Location: http://localhost/presence-management/pages/listOfChoriste.php");
}
else{
    $error[]= "Oups! something when wrong";
    echo '<script>alert("Oups! something when wrong")</script>';
    header("Location: http://localhost/presence-management/pages/listOfChoriste.php");

}
