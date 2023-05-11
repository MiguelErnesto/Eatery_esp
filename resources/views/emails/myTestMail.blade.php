<!DOCTYPE html>
<html>

<head>
    <title>{{ config('app.nombre_principal') }} | Correo electŕonico</title>
</head>

<body>
    <h3>
        Detalles:
    </h3>
    <p>
        @if ($body['date'])
            Código: {{ $body['code'] }} <br />
            Fecha: {{ $body['date'] }} <br />
            Hora: {{ $body['time'] }} <br />
            Clientes: {{ $body['quantity'] }} <br />
        @else
            {{ $body['message'] }}
        @endif
    </p>
    <br />
    Mensaje enviado por: <br />
    {{ $name }} - {{ $email }}
</body>

</html>
