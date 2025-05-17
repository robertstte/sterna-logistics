@extends('layouts.emails')

@section('content')
<p class="name">Estimado/a {{ $name }}</p>
<div class="content">
    <p>Queremos informale que su contraseña ha sido cambiada con éxito el <strong>{{ $date }}.</strong></p>
    <p>Si realizaste el cambio, no necesitas hacer nada más.</p>
    <p>Si no reconoces esta acción, te recomendamos que restablezcas tu contraseña de inmediato utilizando el siguiente <strong>enlace.</strong></p>
    <p>Adémas, para mantener tu cuenta protegida, te sugerimos:</p>
    <ul>
        <li>Usar una contraseña fuerte y única.</li>
        <li>No compartir tus credenciales con nadie.</li>
        <li>Estar atento/a a actividades sospechosas en tu cuenta.</li>
    </ul>
    <p>Si tienes alguna pregunta o necesitas ayuda, contáctanos en <strong>soporte@sterna.es</strong></p>
    <p>Atentamente, el quipo de Sterna.</p>
</div>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap');
    .name {
        font-size: 24px;
        margin-top: 50px;
        margin-left: 25px;
        margin-right: 25px;
        font-weight: 600;
        font-family: "Onest"
    }
    .content {
        font-size: 16px;
        margin-top: 15px;
        margin-left: 25px;
        margin-right: 25px;
        font-family: "Onest"
    }
    strong {
        color: rgb(0, 168, 255);
    }
</style>