@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pagar con Stripe</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('stripe.process') }}" method="POST" id="payment-form">
        @csrf

        <article>
            <label for="card-element">Introduce tu tarjeta:</label>
            <div id="card-element" class="form-control"></div>
            <div id="card-errors" role="alert" class="text-danger mt-2"></div>
        </article>

        <button class="btn btn-primary mt-3">Pagar 10€</button>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ config('services.stripe.key') }}');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const {token, error} = await stripe.createToken(card);
        if (error) {
            document.getElementById('card-errors').textContent = error.message;
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>
@endpush
