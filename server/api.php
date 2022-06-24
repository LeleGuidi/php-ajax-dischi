<?php
    require __DIR__ . '/./database.php';
    header('Content-type: Application/json');
    if (!empty($_GET['genre'])) {
        foreach ($database as $album) {
            if (in_array($_GET['genre'], $album)) {
                $albums[] = $album;
            }
        }
    } else {
        $albums = $database;
    }

    echo json_encode($albums);
?>