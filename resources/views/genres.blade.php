<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jukebox-mpa</title>
    </head>
    <body>
        <h1>Genres</h1>
        <ul style="list-style: none;">
        @foreach($tableGenre as $currentValue)

        <li style="margin: 5px;"><a href="songs/{{$currentValue->id}}">{{$currentValue->name}}</a></li>

        @endforeach
        <button  style="margin: 5px; padding: 5px;" ><a href="/">go back</a></button>
        </ul>
    </body>
</html>
