<?php
    //include("../../app/config.php");

    $sql = "SELECT * FROM parentescos WHERE estado = '1'";
    $query_parentescos = $pdo->prepare($sql);
    $query_parentescos->execute();

    $parentescos = $query_parentescos->fetchAll(PDO::FETCH_ASSOC);
    