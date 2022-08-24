<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>jukebox-mpa</title>
    </head>
    <body>
        <h1>songs</h1>
        <ul style="list-style: none;">
        @foreach($tableSong as $currentValue)
            
            <li style="padding: 5px; margin: 5px; border: solid 1px black;">
                <a href="/songDetails/{{$currentValue->id}}">name: {{$currentValue->name}}</a>
            </li>

        @endforeach
        </ul>
    </body>
</html>
</body>
</html>