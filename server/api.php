<?php
    require __DIR__ . '/./database.php'
    header('Content-type: Application/json');
    echo json_encode($database);
?>