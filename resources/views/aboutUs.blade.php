@extends('layouts.app')

@section('content')
<style>
    .about-container {
        min-height: 50vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
    }

    .card-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        max-width: 1200px;
        width: 100%;
    }

    .about-card {
        flex: 1 1 300px;
        background-color: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 31, 63, 0.3);
        color: rgb(0, 31, 63);
        min-width: 280px;
        max-width: 350px;
        text-align: center;
    }

    .about-card h3 {
        font-size: 24px;
        margin-bottom: 15px;
        color: rgb(0, 168, 255);
    }

    .about-card p {
        line-height: 1.8;
        font-size: 16px;
    }
</style>

<div class="about-container">
    <div class="card-wrapper">
        <div class="about-card">
            <h3>Conócenos</h3>
            <p>
                En <strong style="color:rgb(0, 168, 255)">Sterna</strong> creemos en un mundo más conectado. Nuestra misión es ofrecer envíos a gran escala rápidos y seguros a cualquier parte del mundo.
            </p>
        </div>

        <div class="about-card">
            <h3>Nuestro equipo</h3>
            <p>
                Contamos con un equipo profesional y comprometido que trabaja cada día para mejorar nuestros procesos y brindar el mejor servicio al cliente.
            </p>
        </div>

        <div class="about-card">
            <h3>Nuestros servicios</h3>
            <p>
                Desde paquetería nacional hasta entregas internacionales, brindamos soluciones flexibles y confiables. Además, puedes hacer seguimiento de tus pedidos en tiempo real.
            </p>
        </div>
    </div>
</div>
@endsection
