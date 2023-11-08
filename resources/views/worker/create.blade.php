<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Create Page
<div>
    <hr>
    <form action="{{ route('worker.store') }}" method="post">
        @csrf
        <div><input placeholder="name" type="text" name="name"></div>
        <div><input placeholder="surname" type="text" name="surname"></div>
        <div><input placeholder="email" type="email" name="email"></div>
        <div><input placeholder="age" type="number" name="age"></div>
        <div><textarea placeholder="description" name="description"></textarea></div>
        <div>
            <input type="checkbox" id="is_married" name="is_married">
            <label for="is_married">is_married</label>
        </div>
        <div><input type="submit" value="Добавить"></div>
    </form>
</div>
</body>
</html>
