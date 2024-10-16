<?php

$SQL = "SELECT COUNT(usersId) FROM users GROUP BY usersId";
$req = $PDO->query($SQL);





