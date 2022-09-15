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


    <form style="border: solid black 1px; margin: 5px; padding: 5px; " method="post" action="/addToSavedPlaylist/{{$currentSong->id}}">
            @csrf
            <p>save this song in one of your Saved Playlists</p>
            <select name="selectedPlaylist">
                @foreach($user_playlists as $playlist)
                        <option value="{{$playlist->id}}">{{$playlist->id}}</option>
                @endforeach
            </select>
            <input type="submit" value="add to selected playlist">
        </form>
        @endauth
    </body>
</html>
