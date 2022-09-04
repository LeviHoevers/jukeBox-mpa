<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>your saved playlists</h1>
    @foreach($savedPlaylists as $currentPlaylist)
        <div style="border: solid black 1px; margin: 5px; padding: 5px;">
            <a href="savedPlaylistDetails">
                <p>name: {{$currentPlaylist->name}}</p>
                <p>click to see more details</p>
                <button><a href="/changeNamePlaylist/{{$currentPlaylist->id}}">change name</a></button>
                <button><a href="/deletePlaylist/{{$currentPlaylist->id}}">delete playlist</a></button>
            </a>
        </div>

    @endforeach
</body>
</html>