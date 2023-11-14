<?php 

require '../db/connection.php';

// 
$data = array(
    'status' => 0,
    'message' => 'Error !'
);

if (isset($_POST['choristeIdIsPresent'])) {
    $DATEFORMAT = date('Y-m-d');
    $CURRENTDATE = date($DATEFORMAT);
    
    $choristeId = $_POST['choristeIdIsPresent'];
    $choristeName = $_POST['choristeName'];
    // $data['message'] = $choristeId;
    $SQLCheckIfIsPresent = 'SELECT * FROM presence WHERE choristeId=:choristeId AND presentAt=:presentAt';
    $choristePresent = $PDO->prepare($SQLCheckIfIsPresent);
    $choristePresent->bindParam(":choristeId", $choristeId);
    $choristePresent->bindParam(":presentAt", $CURRENTDATE);

    $choristePresent->execute();

    if ($choristePresent->rowCount() == 0) {
       
        $date = date('Y-m-d');
        $SQL1 = 'INSERT INTO  presence(choristeId,ChoristeName,presentAt) VALUES (:choristeId,:choristeName,:presentAt)';       
        try {
            //code..
            $req = $PDO->prepare($SQL1);
            $PARAM = [
                ":choristeId" => $choristeId,
                ":choristeName" => $choristeName,
                ":presentAt" => $date,
            ];
            $req->execute($PARAM);
            $data['message'] = "This choriste its now present today !";

        } catch (PDOException $ex) {
            $data['message'] = $ex->getMessage();
            
        }
        
    } else {
        $data['message'] = "This choriste was already present today !";
    }
    
    
    
    
}
echo json_encode($data);
