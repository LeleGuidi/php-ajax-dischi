<?php
    require __DIR__ . '/./server/database.php';

    $allGenre = [];

    //Funzione per ottenere i generi e inserirli poi nella select
    function getAllGenre($albums, $genre) {
        foreach ($albums as $album) {
            if (!in_array($album["genre"], $genre)) {
                $genre[] = $album["genre"];
            }
        }
        return $genre;
    };

    $allGenre = getAllGenre($database, $allGenre);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">    
    </head>
    <body>
        <header class="header">
            <img src="./img/spotify-logo.png" alt="Logo Spotify" class="header_logo">
            <form>
                <label for="genre">Seleziona un genere</label>
                <select id="genre">
                    <option value>Tutti i generi</option>
                    <?php foreach($allGenre as $genre) : ?>
                        <?php  echo "<option value='$genre'>$genre</option>" ?>
                    <?php endforeach; ?>

                </select>
            </form>
        </header>
        <main class="main">
            <section class="container_main">
                <div class="row_main">
                    <?php foreach ($database as $album) : ?>
                        <div class="card col_main">
                            <div class="card_img">
                                <?php 
                                    echo "<img src='$album[poster]' alt='$album[title]'>"
                                ?>
                            </div>
                            <div class="card_detail">
                                    <h3><?= $album['title']?></h3>
                                    <h4><?= $album['author']?></h4>
                                    <h4><?= $album['year']?></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>
    </body>
</html>