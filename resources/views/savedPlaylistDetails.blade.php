<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>saved playlist songs</h1>
    @foreach($allSongs as $song)

        <div style="border: solid black 1px; margin: 5px; padding: 5px;">
            <ul style="list-style: none;">
                <li>name: {{$song->name}}</li>
                <li>artist: {{$song->artist}}</li>
                <li>duration: {{$song->duration}}</li>
            </ul>
            <button><a href="/deleteSavedSong/{{$song->id}}/{{$saved_playlist_id}}">delete song</a></button>
            <!-- <button><a href=""></a></button> -->
        </div>
    @endforeach

    
</body>
</html>