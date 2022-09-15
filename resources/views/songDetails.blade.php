<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jukebox-mpa</title>
    </head>
    <body>
        <h1>song info</h1>
        <ul>
            <li>Name: {{$currentSong->name}}</li>
            <li>Artist: {{$currentSong->artist}}</li>
            <li>Duration: {{$currentSong->duration}}</li>
            <li>Created at: {{$currentSong->created_at}}</li>
        </ul>
        <button><a href="/addSong/{{$currentSong->id}}">add to playlist</a></button>
        @auth
        <form method="post" action="selectPlaylist">
            <input type="select">
        </form>

        @endauth
    </body>
</html>
