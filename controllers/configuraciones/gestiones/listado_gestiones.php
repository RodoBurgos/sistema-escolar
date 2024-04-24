<?php
    //include("../../app/config.php");

    $sql = "SELECT * FROM gestiones";
    $query_gestiones = $pdo->prepare($sql);
    $query_gestiones->execute();

    $gestiones = $query_gestiones->fetchAll(PDO::FETCH_ASSOC);
    