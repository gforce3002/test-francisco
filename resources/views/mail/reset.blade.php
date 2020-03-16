@extends('mail.template')

@section('content')
    <h2>Cambio de contraseña</h2>
    <p>
        Estas recibiendo esta solicitud porque es ha generado una petición de cambio de contraseña en tu cuenta,
    </p>
    <p>
        A continuación te proporcionamos el enlace para proceder con el cambio:
    </p>
    <p>
        <a href="{{$url}}">Cambiar mi contraseña</a>
    </p>
    <p>
        Si tu no has generado la solicitud, por favor haz caso omiso del mensaje.
    </p>
@endsection