<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/changePlaylist/{{$selectedPlaylist->id}}">
        @csrf
        <h1>change playlist name</h1>
        <p>current name: {{$selectedPlaylist->name}}</p>
        <input name="input" type="text">
        <input value="save changes" type="submit">
    </form>
</body>
</html>