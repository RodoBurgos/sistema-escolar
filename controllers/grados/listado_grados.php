<?php
    //include("../../app/config.php");

    $sql = "SELECT g.*,n.nivel,n.turno FROM grados as g INNER JOIN niveles as n ON g.nivel_id=n.id_niveles WHERE g.estado = 'ACTIVO'";
    $query_grados = $pdo->prepare($sql);
    $query_grados->execute();

    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);
    