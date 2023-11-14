<?php

$SQL = 'SELECT COUNT(*) FROM choriste';
$req = $PDO->query($SQL);
$NUMBEROFCHORISTE = $req->fetch(PDO::FETCH_COLUMN);

$SQL_NUMBEROFFEMALE = "SELECT COUNT(*) FROM choriste WHERE sexe='female' ";
$reqF = $PDO->query($SQL_NUMBEROFFEMALE);
$NUMBEROFFEMALE = $reqF->fetch(PDO::FETCH_COLUMN);

$SQL_NUMBEROFMALE = "SELECT COUNT(*) FROM choriste WHERE sexe='male' ";
$reqM = $PDO->query($SQL_NUMBEROFMALE);
$NUMBEROFMALE = $reqM->fetch(PDO::FETCH_COLUMN);

