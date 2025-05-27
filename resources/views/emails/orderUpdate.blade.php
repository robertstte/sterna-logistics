<html>
    <head>
        <meta charset="UTF-8">
        <title>Password Change Confirmation</title> 
    </head>
    <body>
        <header>
            <p class="logo">Sterna.</p>
        </header>
        <main>
            <p class="name">Estimado/a {{ $name }}</p>
            <div class="content">
                <p>Queremos informale que su orden <strong>Nº {{ $order }}</strong> ha cambiado de estado el <strong>{{ $date }}.</strong></p>
                <p>Descripción: {{ $description }}</p>
                <p>Estado: <strong style="color: {{ $color }}">{{ $status }}</strong></p>
                <p>Fecha llagada prevista: <strong>{{ $arrival_date }}</strong></p>
                <p>Observaciones: <strong>{{ $observations }}</strong></p>
                <p>Si tienes alguna pregunta o necesitas ayuda, contáctanos en <strong>soporte@sterna.es</strong></p>
                <p>Atentamente, el quipo de Sterna.</p>
            </div>
        </main>
        <footer>
            <p class="copyright">&copy {{ date('Y') }} Sterna. Todos los derechos reservados.</p>
            <p class="privacy">Política de privacidad y Términos de uso.</p>
        </footer>
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