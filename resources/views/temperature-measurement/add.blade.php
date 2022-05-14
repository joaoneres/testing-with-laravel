<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h3>Adicionar temperatura</h3>
    <form action="{{route('temperature-measurement.save')}}" method="post">
        @csrf
        <input type="number" name="temperature" placeholder="Temperatura">
        <button type="submit">Enviar temperatura</button>
    </form>
</body>

</html>
