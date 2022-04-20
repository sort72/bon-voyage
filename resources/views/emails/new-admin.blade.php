@component('mail::message')
# Registro de usuario administrador en Bon Voyage

Hola {{$user->name}}, se ha registrado una cuenta con este email en Bon Voyage el {{$user->created_at->translatedFormat('j \d\e F \d\e Y \a \l\a\s g:i a')}}

**Nombre de usuario:** {{$user->email}}

Ingresa una contraseña y configura tu cuenta en el siguiente enlace para poder utilizar el sistema:

@component('mail::button', ['url' => $url])
Configurar mi contraseña
@endcomponent

Atentamente,<br>
El equipo de Bon Voyage
@endcomponent
