@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('welcome'))
                <div class="alert alert-success mb-4">
                    <h4>¡Bienvenido {{ Auth::user()->username }}!</h4>
                    <p>Por favor, selecciona el plan que mejor se adapte a tus necesidades.</p>
                </div>
            @endif

            <h2 class="text-center mb-5">Planes de Suscripción</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                @foreach($plans as $plan)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 {{ $currentPlan->id === $plan->id ? 'border-primary' : '' }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $plan->name }}</h5>
                            <p class="card-text">{{ $plan->description }}</p>
                            <p class="card-text"><strong>Precio: {{ $plan->price }}€</strong></p>
                            
                            @if($currentPlan->id === $plan->id)
                                <button class="btn btn-primary" disabled>Plan Actual</button>
                            @else
                                <form action="{{ route('plans.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                                    <button type="submit" class="btn btn-outline-primary">Cambiar a este plan</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.card {
    transition: all 0.3s ease;
    border: 1px solid #ddd;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card.border-primary {
    border-width: 2px;
}

.card-title {
    color: #007bff;
    font-weight: bold;
}

.btn {
    width: 100%;
    margin-top: 15px;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 0.25rem;
    margin-bottom: 1rem;
}
</style>
@endsection 