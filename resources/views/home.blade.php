<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jukebox-mpa</title>
    </head>
    <body>
        @auth
        <p>you're logged in!</p>
        <button><a href="">log out</a></button>
        @endauth
        <h1>song info</h1>
        <form action="">
            <h1>click the button where you would like to go</h1>
            <button><a href="/genres">go to genres</a></button>
            <button><a href="/playlist">go to playlist</a></button>
            @auth
            <button><a href="/savedPlaylists">go to saved playlists</a></button>
            @endauth
        </form>
    </body>
</html>
