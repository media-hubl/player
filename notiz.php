<html>


<script>
    window.onload = () => {
        updateSeite()
    }
    function songUpdate(params) {
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.laut.fm/station/mangoradio/current_song",
            "method": "GET",
            "headers": {}
        };
        $.ajax(settings).done(function(response) {
            console.log(response.title, response.artist.name);
            document.getElementById("song-title").innerText = response.title
            document.getElementById("song-artist").innerText = response.artist.name
        });
    }


    function playlistUpdate(params) {
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.laut.fm/station/mangoradio",
            "method": "GET",
            "headers": {}
        };
        $.ajax(settings).done(function(response) {
            console.log(response.current_playlist.name, response.next_playlist.name, response.current_playlist.starts_at, response.current_playlist.ends_at);
            document.getElementById("current-playlist").innerText = response.current_playlist.name
            document.getElementById("next-playlist").innerText = response.next_playlist.name
            document.getElementById("from-time").innerText = response.current_playlist.starts_at
            document.getElementById("to-time").innerText = response.current_playlist.ends_at
        });
    }



    songUpdate()
    playlistUpdate()

    setInterval(() => {
        songUpdate()
    }, 15000);

    setInterval(() => {
        playlistUpdate()
    }, 15000);
</script>

<!--
<body>
  <form action="web_song-title.txt" method="post">
    <p id="song-title"></p>
    <input type="submit" value"OK">
  </form>
  <form action="web_song-artist.txt" method="post">
    <p id="song-artist"></p>
    <input type="submit" value"OK">
  </form>
  <form action="web_current-playlist.txt" method="post">
    <p id="current-playlist"></p>
    <input type="submit" value"OK">
  </form>
  <form action="web_next-playlist.txt" method="post">
    <p id="next-playlist"></p>
    <input type="submit" value"OK">
  </form>
  <form action="web_from-time.txt" method="post">
    <p id="from-time"></p>
    <input type="submit" value"OK">
  </form>
  <form action="web_to-time.txt" method="post">
    <p id="to-time"></p>
    <input type="submit" value"OK">
  </form>
</body>
-->


<?php
$song_title = "<p id="song-title"></p>";
$song_artist = "<p id="song-artist"></p>";
$current_playlist = "<p id="current-playlist"></p>";
$next_playlist = "<p id="next-playlist"></p>";
$from_time = "<p id="from-time"></p>";
$to_time = "<p id="to-time"></p>";

$song_title_txt = "web_song-title.txt";
$song_artist_txt = "web_song-artist.txt";
$current_playlist_txt = "web_current-playlist.txt";
$next_playlist_txt = "web_next-playlist.txt";
$from_time_txt = "web_from-time.txt";
$to_time_txt = "web_to-time.txt";

file_put_contents($song_title_txt, $song_title);
file_put_contents($song_artist_txt, $song_artist);
file_put_contents($current_playlist_txt, $current_playlist);
file_put_contents($next_playlist_txt, $next_playlist);
file_put_contents($from_time_txt, $from_time);
file_put_contents($to_time_txt, $to_time);



?>


<!DOCTYPE html>
<html>
<head>
    <title>Titel</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
    <form action="indateispeichern02.php" method="post">
    Hier kommt der Text hinein der gespeichert werden soll:<br>
    <!-- Der Benutzer gibt einen Text in ein Textarea ein - dieser
    wird dann an die Seite indateispeichern02.php übergeben-->
    <textarea name="meintext" cols="40" rows="3"></textarea>
    <br>
    <input type="submit" value="OK"><br>
    </form>
</body>
</html>


<?php
if (!empty($_POST['meintext'])){
   $Dateiname="meineDatei.txt";
   $zuschreibenderText=$_POST['meintext'];
   //eine Datei wird zum Schreiben geöffnet
   $PHP_Datei = fopen($Dateiname,"w+");
   //es wird etwas in die Datei geschrieben
   fputs($PHP_Datei,$zuschreibenderText);
   //die Datei wird nach dem Schreiben wieder geschlossen
   fclose($PHP_Datei);
   echo "der folgende Text wurde in die Datei ".$Dateiname." geschrieben:<br>";
   echo "OHNE htmlspecialchars und nl2br:<br>";
   echo $zuschreibenderText."<br>";
   //htmlspecialchars wandelt die in einer Zeichenkette
   //enthaltenen Sonderzeichen in die entsprechende HTML-Codes um
   $zuschreibenderText=htmlspecialchars($zuschreibenderText);
   //Fügt vor allen Zeilenumbrüchen eines Strings
   //HTML-Zeilenumbrüche ein
   $zuschreibenderText=nl2br($zuschreibenderText);
   echo "MIT htmlspecialchars und nl2br:<br>";
   echo $zuschreibenderText."<br>";
}
?>



<!--
<div class="anzeige-element anzeige-song">
<h1 id="Player-Song">Loading Song....</h1>
<h2 id="Player-Artist">Loading Artist....</h2>
</div>
-->










<!-- Titel --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#song-title').load('https://mangoradio.de/media/other/web_song-title.html');});</script><span id="song-title"></span>
-->
<!-- Interpret --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#song-artist').load('https://mangoradio.de/media/other/web_song-artist.html');});</script><span id="song-artist"></span>
-->
<!-- Aktuelle Playlist --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#current-playlist').load('https://mangoradio.de/media/other/web_current-playlist.html');});</script><span id="current-playlist"></span>
-->
<!-- Nächste Playlist --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#next-playlist').load('https://mangoradio.de/media/other/web_next-playlist.html');});</script><span id="next-playlist"></span>
-->
<!-- Von-Uhrzeit --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#from-time').load('https://mangoradio.de/media/other/web_from-time.html');});</script><span id="from-time"></span>
-->
<!-- Bis-Uhrzeit --><!--
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js"></script><script type="text/javascript">$(document).ready(function(){$('#to-time').load('https://mangoradio.de/media/other/web_to-time.html');});</script><span id="to-time"></span>
-->

</html>


<!-- Das da geht für Webseiteneinbindung -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.1.min.js">
</script><script type="text/javascript">$(document).ready(function(){$('#inserttext').load('https://api.laut.fm/station/mangoradio/current_song.txt');});</script>
<div id="inserttext"></div>



https://mangoradio.de/media/other/web_song-title.html


























<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js " referrerpolicy="no-referrer "></script>



            <div class="anzeige-element anzeige-song">
                <h1 id="Player-Song">Loading Song....</h1>
                <h2 id="Player-Artist">Loading Artist....</h2>
            </div>



<script>
    window.onload = () => {
        updateSeite()
    }
    function songUpdate(params) {

        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.laut.fm/station/mangoradio/current_song",
            "method": "GET",
            "headers": {}
        };
        $.ajax(settings).done(function(response) {
            console.log(response.title, response.artist.name, response.image);
            document.getElementById("Player-Song").innerText = response.title
            document.getElementById("Player-Artist").innerText = response.artist.name
        });
    }
    songUpdate()

    setInterval(() => {
        songUpdate()
    }, 15000);
</script>
