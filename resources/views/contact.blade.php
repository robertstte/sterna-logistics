@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: white;
    }

    .contact-container {
        min-height: 100vh;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .contact-card {
        width: 100%;
        max-width: 700px;
        background-color: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 31, 63, 0.3);
        color: rgb(0, 31, 63);
    }

    .contact-card h2 {
        text-align: center;
        margin-bottom: 25px;
        color: rgb(0, 31, 63);
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
    }

    .form-group textarea {
        height: 120px;
        resize: vertical;
    }

    .contact-card button {
        background-color: rgb(0, 168, 255);
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        font-size: 16px;
        width: 100%;
        transition: background-color 0.2s;
    }

    .contact-card button:hover {
        background-color: rgb(0, 140, 210);
    }
</style>

<div class="contact-container">
    <div class="contact-card">
        <h2>@lang('translations.contact.title')</h2>
        <form action="{{ route('contact') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">@lang('translations.contact.name')</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="email">@lang('translations.contact.email')</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="message">@lang('translations.contact.message')</label>
                <textarea name="message" id="message" required></textarea>
            </div>

            <button type="submit">Enviar</button>
        </form>
    </div>
</div>
@endsection
