<?php

$SQL = "SELECT COUNT(choristeId) FROM presence GROUP BY choristeId";
$req = $PDO->query($SQL);

$NUMBER = array();

while ($data =$req->fetch(PDO::FETCH_COLUMN)) {
    $NUMBER[] = $data;
}

$SQL_CHORISTE = "SELECT DISTINCT choristeName FROM presence";
$req1 = $PDO->query($SQL_CHORISTE);

$CHORISTEPRESENT = array();
while ($datas = $req1->fetch()) {
    $CHORISTEPRESENT[] = $datas['choristeName'];
    // print_r($CHORISTEPRESENT['choristeName']);
}




