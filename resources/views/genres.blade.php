<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jukebox-mpa</title>
    </head>
    <body>
        <h1>bye men</h1>
        <ul>
        @foreach($tableGenre as $currentValue)

        <li>{{$currentValue->name}}</li>

        @endforeach
        </ul>
    </body>
</html>
