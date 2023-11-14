<?php

require '../db/connection.php';

if (isset($_POST['displaySend'])) {
    $tables = array(
        
    );

    $table = '<table class="table"  style="width: 100%">
<thead class="bg-dark text-white">
    <tr>
        <th>#</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Telephone</th>
        <th>Company</th>
        <th>Mark the presence</th>
    </tr>
</thead>';
    $SQL = 'SELECT * FROM choriste';

    $req = $PDO->query($SQL);

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $choristeId = $data['choristeId'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $email = $data['email'];
        $addresse = $data['addresse'];
        $phone = $data['phone'];
        $comapany = $data['company'];

        $table .= '
        <tr>
        <td>' . $choristeId . '</td>
        <td>' . $firstName . '</td>
        <td>' . $lastName . '</td>
        <td>' . $email . '</td>
        <td>' . $addresse . '</td>
        <td>' . $phone . '</td>
        <td>' . $comapany . '</td>

        <td>
        
            <button class="btn btn-primary fw-bold" onclick="confirmePresence(' . $choristeId . ')">present</button>  
        </td>
    </tr>
    ';
    }
    $table .= '</table>';
    echo $table;
}

