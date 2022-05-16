<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Adicionar endereço</h3>
    <form action="{{route('address.store')}}" method="post">
        @csrf
        <input required type="text" placeholder="CEP" name="cep">
        <input required type="number" placeholder="Número da casa" name="address_number">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
