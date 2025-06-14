<html>
    <head>
        <meta charset="UTF-8">
        <title>Password Recovery Confirmation</title>
    </head>
    <body>
        <header>
            <p class="logo">Sterna.</p>
        </header>
        <main>
            @if ($language == 'es')
            <p class="name">Estimado/a {{ $name }}</p>
            <div class="content">
                <p>Hemos recibido una solicitud para recuperar tu contraseña el <strong>{{ $date }}.</strong></p>
                <p>Su token de recuperación es <strong>{{ $token }}.</strong></p>
                <p>Si fuiste tú quien realizó esta solicitud, puedes restablecer tu contraseña haciendo clic en el siguiente <strong>enlace.</strong></p>
                <p>Si no realizaste esta solicitud, por favor ignora este correo. En ese caso, te recomendamos cambiar tu contraseña de inmediato para proteger tu cuenta.</p>
                <p>Además, para mantener tu cuenta segura, te sugerimos:</p>
                <ul>
                    <li>Usar una contraseña fuerte y única.</li>
                    <li>No compartir tus credenciales con nadie.</li>
                    <li>Estar atento/a a actividades sospechosas en tu cuenta.</li>
                </ul>
                <p>Si tienes alguna pregunta o necesitas asistencia, contáctanos en <strong>soporte@sterna.es</strong></p>
                <p>Atentamente, el equipo de Sterna.</p>
            </div>
        </main>
        <footer>
            <p class="copyright">&copy; {{ date('Y') }} Sterna. Todos los derechos reservados.</p>
            <p class="privacy">Política de privacidad y Términos de uso.</p>
        </footer>
        @else
        <p class="name">Dear {{ $name }}</p>
            <div class="content">
                <p>We have received a request to recover your password on <strong>{{ $date }}.</strong></p>
                <p>Your recovery token is <strong>{{ $token }}.</strong></p>
                <p>If you made this request, you can reset your password by clicking on the following <strong>link.</strong></p>
                <p>If you did not make this request, please ignore this email. In that case, we recommend changing your password immediately to protect your account.</p>
                <p>Additionally, to keep your account secure, we suggest:</p>
                <ul>
                    <li>Using a strong and unique password.</li>
                    <li>Not sharing your credentials with anyone.</li>
                    <li>Being alert to suspicious activity on your account.</li>
                </ul>
                <p>If you have any questions or need assistance, contact us at <strong>support@sterna.es</strong></p>
                <p>Best regards, the Sterna team.</p>
            </div>
        </main>
        <footer>
            <p class="copyright">&copy; {{ date('Y') }} Sterna. All rights reserved.</p>
            <p class="privacy">Privacy Policy and Terms of Use.</p>
        </footer>
        @endif
    </body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap');
    header {
        height: 100px;
        background-color: rgb(0, 31, 63);
    }
    main {
        margin-bottom: 50px;
    }
    .logo {
        font-size: 64px;
        padding-top: 10px;
        font-weight: 700;
        margin-left: 25px;
        font-family: "Onest";
        color: rgb(255, 255, 255);
    }
    .name {
        font-size: 24px;
        margin-top: 50px;
        font-weight: 600;
        margin-left: 25px;
        margin-right: 25px;
        font-family: "Onest";
    }
    .content {
        font-size: 16px;
        margin-top: 15px;
        margin-left: 25px;
        margin-right: 25px;
        margin-bottom: 15px;
        font-family: "Onest";
    }
    strong {
        color: rgb(0, 168, 255);
    }
    footer {
        bottom: 0;
        width: 100%;
        height: 100px;
        display: flex;
        font-size: 14px;
        font-weight: 600;
        font-family: "Onest";
        color: rgb(255, 255, 255);
        background-color: rgb(0, 31, 63);
    }
    .copyright {
        text-align: left;
        margin-left: 25px;
        margin-top: 37.5px;
    }

    .social {
        gap: 30px;
        padding: 0;
        display: flex;
        list-style: none;
        margin-top: 30px;
    }

    .privacy {
        text-align: right;
        margin-left: auto;
        margin-top: 37.5px;
        margin-right: 25px;
    }
</style>