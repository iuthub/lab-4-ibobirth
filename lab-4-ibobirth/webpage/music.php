<?php  @$playlist = $_REQUEST["playlist"];


function sizeFunction($someSong)
{
    if(filesize($someSong)<1023)
    {
        print round(filesize($someSong),2) . "bytes";
    }

    elseif(filesize($someSong)>1024 && filesize($someSong)<1048575)
    {
        print round(filesize($someSong)/1024,2) . "kilobytes";
    }

    elseif(filesize($someSong)>1048576)
    {
        print round(filesize($someSong)/1048576,2) . "megabytes";
    }
}?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Viewer</title>
    <link href="viewer.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="header">

    <h1>190M Music Playlist Viewer</h1>
    <h2>Search Through Your Playlists and Music</h2>
</div>


<div id="listarea">
    <ul id="musiclist">
        <?php

        if($playlist == '') {
            $songs = glob("songs/*.mp3");
            foreach($songs as $song )
            {
                ?>
                <li class="mp3item"> <a href="<?=$song?>">  <?=basename($song);?> (<?php @sizeFunction($song);?>)   </a> </li>
            <?php } ?>

            <?php $playl = glob("songs/*.txt");
            foreach ($playl as  $_list)
            {?>  <li class="playlistitem">
                <a href="<?=$_list?> ">
                    <?=basename($_list);?>
                </a>
            </li>
            <?php }
        }
        elseif( $playlist == "playlist.txt") {
            $songsIn1 = file("songs/playlist.txt");

            foreach ($songsIn1 as $songFrom1 )
            { ?> <li class ="playlistitem" ><a href="<?=$songFrom1?> ">
                    <?=basename($songFrom1);?>
                </a> </li> <?php } }

        elseif($playlist == "mypicks.txt")
        {$songsIn2 = file("songs/mypicks.txt");
            foreach ($songsIn2 as $songFrom2)
            {?> <li class ="playlistitem" ><a href="<?=$songFrom2?> ">
                    <?=basename($songFrom2);?>
                </a> </li> <?php } }

        elseif($playlist == "190M Mix.txt")
        {$songsIn3 = file("songs/190M Mix.txt");
            foreach ($songsIn3 as $songFrom3)
            {?> <li class ="playlistitem" ><a href="<?=$songFrom3?> ">
                    <?=basename($songFrom3);?>
                </a> </li> <?php } }

        ?>




    </ul>
</div>

</body>
</html>