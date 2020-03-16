@extends('mail.template')

@section('content')
    <h2>Bienvenido a {{ env('APP_NAME') }}</h2>
    <p>
        A partir de ahora puedes hacer uso de la plataforma administrativa desde <a href="{{ url('/') }}">{{ url('/') }}</a>
    </p>
    <p>
        A continuación te proporcionamos tus datos de acceso.
    </p>
    <p>
        Usuario: {{ $user->email }}<br/>
        Contraseña: {{ $password }}
    </p>
    <p>
        Asegurate de guardar estos datos correctamente. {{ env('APP_NAME') }} te desea un excelente día.
    </p>
@endsection