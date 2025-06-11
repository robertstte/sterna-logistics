@extends('layouts.access')

@section('content')
<div class="row p-5">
    <div class="row">
        <div class="col-12 col-xl-6  d-none d-xl-flex justify-content-center" style="margin-right: 100px; margin-left: 80px;">
            <img loading="lazy" class="w-100 h-100" src="{{ asset('images/access.svg') }}" alt="@lang('translations.access.register.illustration')">
        </div>
        <div class="col-12 col-xl-4  slide-in d-flex flex-column justify-content-center align-itmes-center access-form" id="page">
            <div class="row">
                <div class="col-6">
                    <p class="access-form-title">@lang('translations.access.register.title')</p>

                </div>
                <div class="col-6">
                    <a onclick="prevStep()" style="cursor: pointer;"><img loading="lazy" class="access-form-back" src="{{ asset('images/back.svg') }}" alt="@lang('translations.access.register.back')"></a>
                </div>
            </div>
           <form method="POST" action="{{ route('register') }}" style="margin-bottom: 0;">
             @csrf
                <div class="step" id="step-content1">
                    <input class="access-form-name" type="text" placeholder="@lang('translations.access.register.name')" name="name" required>
                    <input class="access-form-register-email" type="email" placeholder="@lang('translations.access.register.email')" name="email" required>
@if($errors->has('email'))
    <span class="form-error" style="display:block;visibility:visible;">{{ $errors->first('email') }}</span>
@endif
                    <div class="row w-100">
                        <div class="col-6 d-flex justify-content-start access-form-customer-type">
                            <input class="access-form-customer-type-radio" value="2" type="radio" name="customerType">
                            <span>@lang('translations.access.register.individual')</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end access-form-customer-type">
                            <input class="access-form-customer-type-radio" value="1" type="radio" name="customerType">
                            <span>@lang('translations.access.register.company')</span>
                        </div>
                    </div>
                    <p class="form-error">Faltan campos por completar</p>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(1)" class="access-form-submit">@lang('translations.access.register.next')</button>
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('images/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="step step-hidden" id="step-content2">
                    <input class="access-form-address" type="text" placeholder="@lang('translations.access.register.address')" name="address" required>
                    <input class="access-form-phone mb-4" type="tel" placeholder="@lang('translations.access.register.phone')" name="phone" required>
                    <select class="access-form-select" name="country_id" id="country-select">
                        <option value="">@lang('translations.access.register.select_country')</option>
                    </select>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(2)" class="access-form-submit">@lang('translations.access.register.next')</button>
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('images/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                    <p class="form-error">Faltan campos por completar</p>
                </div>

                <div class="step step-hidden" id="step-content3">
                    <input class="access-form-username" type="text" placeholder="@lang('translations.access.register.username')" name="username" required>
                    <div class="position-relative">
                        <input id="register-password" 
                               class="access-form-password" 
                               type="password" 
                               placeholder="@lang('translations.access.register.password')" 
                               name="password" 
                               required>
                        <img id="register-toggle-password" 
                             onclick="showFormPassword()" 
                             class="position-absolute access-form-eye" 
                             data-eye="{{ asset('images/eye.svg') }}" 
                             data-eye-off="{{ asset('images/eye-off.svg') }}" 
                             src="{{ asset('images/eye.svg') }}">
                    </div>
                    <div class="position-relative">
                        <input id="register-password-confirm" 
                               class="access-form-password" 
                               type="password" 
                               placeholder="@lang('translations.access.register.confirm_password')" 
                               required>
                        <img id="register-toggle-password-confirm" 
                             onclick="showFormPasswordConfirm()" 
                             class="position-absolute access-form-eye" 
                             data-eye="{{ asset('images/eye.svg') }}" 
                             data-eye-off="{{ asset('images/eye-off.svg') }}" 
                             src="{{ asset('images/eye.svg') }}">
                    </div>
                    <p id="password-match-error" class="form-error" style="visibility: hidden;">Las contraseñas no coinciden</p>
                    <div class="row">
                        <div class="col-10">
                            <button type="submit" class="access-form-submit">@lang('translations.access.register.title')</button>                        
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('images/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                    <p class="form-error">Faltan campos por completar</p>
                </div>

                <div class="row d-flex form-step-container">
                    <div class="col-4"><hr class="form-step-active" id="step1" onclick="goToStep(1)"></div>
                    <div class="col-4"><hr class="form-step" id="step2" onclick="goToStep(2)"></div>
                    <div class="col-4"><hr class="form-step" id="step3" onclick="goToStep(3)"></div>
                </div>
           
                <div class="row">
                    <a style="margin-top: 0;" href="login" class="access-form-signup">@lang('translations.access.login.signin')</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

<script>
    let currentStep = 1;

    function showStep(step) {
        const steps = document.querySelectorAll('.step');
        steps.forEach(s => s.classList.add('step-hidden'));

        const selectedStep = document.getElementById('step-content' + step);
        if (selectedStep) {
            selectedStep.classList.remove('step-hidden');
        }

        for (let i = 1; i <= 3; i++) {
            const stepIndicator = document.getElementById('step' + i);
            stepIndicator.classList.remove('form-step-active');
            stepIndicator.classList.add('form-step');
        }

        const activeIndicator = document.getElementById('step' + step);
        if (activeIndicator) {
            activeIndicator.classList.remove('form-step');
            activeIndicator.classList.add('form-step-active');
        }

        currentStep = step;
    }

    function goToStep(step) {
    for (let i = 1; i < step; i++) {
        const stepContainer = document.getElementById(`step-content${i}`);
        const fields = stepContainer.querySelectorAll('input, select');
        let allValid = true;

        fields.forEach(field => {
            if (field.type === 'radio') {
                const radios = stepContainer.querySelectorAll(`input[name="${field.name}"]`);
                if (![...radios].some(r => r.checked)) {
                    allValid = false;
                }
            } else if (!field.value) {
                allValid = false;
            }
        });

        if (!allValid) {
            return; 
        }
    }

    // Evitar ir a un step mayor a 3
    if (step > 3) return;
    showStep(step);
}



function nextStep(step) {
    event.preventDefault();

    const stepContainer = document.getElementById(`step-content${step}`);
    const errorMsg = stepContainer.querySelector('.form-error');
    const currentFields = stepContainer.querySelectorAll('input, select');
    let allValid = true;
    
    // Validación especial para el paso 3 (contraseñas)
    if (step === 3) {
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('register-password-confirm').value;
        const passwordMatchError = document.getElementById('password-match-error');
        
        if (password !== confirmPassword) {
            passwordMatchError.style.visibility = 'visible';
            return;
        } else {
            passwordMatchError.style.visibility = 'hidden';
        }
    }

    currentFields.forEach(field => {
        // No validar el campo de confirmación de contraseña para envío
        if (field.id === 'register-password-confirm') {
            return;
        }
        
        if (field.type === 'radio') {
            const radios = stepContainer.querySelectorAll(`input[name="${field.name}"]`);
            if (![...radios].some(r => r.checked)) {
                allValid = false;
            }
        } else if (!field.value) {
            allValid = false;
        }
    });

    if (allValid) {
        errorMsg.style.visibility = 'hidden';
        // Ya no hay más pasos, si estamos en el 3, enviamos el formulario
        if (step === 3) {
            // Buscar el botón submit y hacer submit
            const form = document.querySelector('form');
            form.requestSubmit();
            return;
        }
        const next = step + 1;
        if (next <= 3) {
            showStep(next);
        }
    } else {
        errorMsg.style.visibility = 'visible';
    }
}


    function prevStep() {
    event.preventDefault();
    if (currentStep > 1) {
        showStep(currentStep - 1);
    }
}
    document.addEventListener('DOMContentLoaded', () => {
        // Cargar países
        fetch('/countries')
            .then(response => response.json())
            .then(countries => {
                const select = document.getElementById('country-select');
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.id;
                    option.textContent = country.name;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
            
        // Validación en tiempo real de las contraseñas
        const passwordField = document.getElementById('register-password');
        const confirmPasswordField = document.getElementById('register-password-confirm');
        const passwordMatchError = document.getElementById('password-match-error');
        
        function validatePasswordMatch() {
            if (confirmPasswordField.value && passwordField.value !== confirmPasswordField.value) {
                passwordMatchError.style.visibility = 'visible';
            } else {
                passwordMatchError.style.visibility = 'hidden';
            }
        }
        
        passwordField.addEventListener('input', validatePasswordMatch);
        confirmPasswordField.addEventListener('input', validatePasswordMatch);

        // Funciones para mostrar/ocultar contraseñas
        window.showFormPassword = function() {
            const passwordField = event.target.previousElementSibling;
            const eyeIcon = event.target;
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.src = eyeIcon.dataset.eyeOff;
            } else {
                passwordField.type = 'password';
                eyeIcon.src = eyeIcon.dataset.eye;
            }
        }

        window.showFormPasswordConfirm = function() {
            const passwordField = event.target.previousElementSibling;
            const eyeIcon = event.target;
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.src = eyeIcon.dataset.eyeOff;
            } else {
                passwordField.type = 'password';
                eyeIcon.src = eyeIcon.dataset.eye;
            }
        }

        showStep(currentStep);
    });
    document.addEventListener('DOMContentLoaded', () => {
    const loginLink = document.querySelector('a[href="login"]');
    if (loginLink) {
        loginLink.addEventListener('click', function (e) {
            e.preventDefault();
            const page = document.getElementById('page');
            page.classList.remove('slide-in');
            page.classList.add('slide-out-right');

            setTimeout(() => {
                window.location.href = this.getAttribute('href');
            }, 400); 
        });
    }
    
    // Eliminar el campo de confirmación de contraseña antes de enviar el formulario
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        // No es necesario eliminar el campo porque no tiene atributo 'name'
        // Solo verificamos que las contraseñas coincidan antes de enviar
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('register-password-confirm').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            document.getElementById('password-match-error').style.visibility = 'visible';
            showStep(3); // Volver al paso de contraseñas
        }
    });

    showStep(currentStep);
});


</script>

<style>
    .step-hidden {
    display: none;
}
.form-step {
    height: 4px;
    background-color: #ccc;
    cursor: pointer;
    border: 4px;
}
.form-step-active {
    background-color: rgb(0 167 255);
}
.step{
    height: 322px;
}
.form-error {
    color: red;
    visibility: hidden;
    margin-top: 4px;
    margin-bottom: 0px;
}

.slide-in {
    animation: slideIn 0.4s ease-in;
}

.slide-out-right {
    animation: slideOutRight 0.4s ease-out;
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateX(100px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideOutRight {
    from {
        opacity: 1;
        transform: translateX(0);
    }
    to {
        opacity: 0;
        transform: translateX(-100px);
    }
}

.password-container {
    position: relative;
    width: 100%;
}

.password-toggle {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #666;
}

.password-toggle:hover {
    color: #333;
}

.access-form-eye {
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

</style>