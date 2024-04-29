<?php
    //include("../../app/config.php");

    $sql = "SELECT n.*, g.nombre as gestion FROM niveles as n INNER JOIN gestiones as g ON n.gestion_id=g.id_gestiones WHERE n.estado = 'ACTIVO'";
    $query_niveles = $pdo->prepare($sql);
    $query_niveles->execute();

    $niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);
    