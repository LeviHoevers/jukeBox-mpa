<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>playlist</h1>
    @if(isset($playlist))
        @foreach($playlist as $songValue)

        <div style="border: solid black 1px; margin: 5px; padding: 5px;">
            <ul style="list-style: none;">
                <li>Name: {{$songValue->name}}</li>
                <li>Artist: {{$songValue->artist}}</li>
                <li>Duration: {{$songValue->duration}}</li>
                <li>Created at: {{$songValue->created_at}}</li>
            </ul>
            <button style="margin: 5px;"><a href="/deleteSong/{{$songValue->id}}">delete song</a></button>
        </div>
        @endforeach
    @endif
    <button style="margin: 5px;"><a href="/">go back</a></button>
</body>
</html>