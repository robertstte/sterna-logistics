@extends('layouts.access')

@section('content')
<div class="row p-5">
    <div class="row">
        <div class="col-12 col-xl-6  d-none d-xl-flex justify-content-center" style="margin-right: 100px;"  >
            <img loading="lazy" class="w-100 h-100" src="{{ asset('images/access.svg') }}" alt="@lang('translations.access.register.illustration')">
        </div>
        <div class="col-12 col-xl-4  slide-in d-flex flex-column justify-content-center align-itmes-center access-form" id="page">
            <div class="row">
                <div class="col-6">
                    <p class="access-form-title">@lang('translations.access.register.title')</p>

                </div>
                <div class="col-6">
                    <a onclick="prevStep()" style="cursor: pointer;"><img loading="lazy" class="access-form-back" src="{{ asset('icons/back.svg') }}" alt="@lang('translations.access.register.back')"></a>
                </div>
            </div>
           <form method="POST" action="{{ route('register') }}" style="margin-bottom: 0;">
             @csrf
                <div class="step" id="step-content1">
                    <input class="access-form-name" type="text" placeholder="@lang('translations.access.register.name')" name="name" required>
                    <input class="access-form-register-email" type="email" placeholder="@lang('translations.access.register.email')" name="email" required>
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
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                </div>
                <div class="step step-hidden" id="step-content2">
                    <input class="access-form-address" type="text" placeholder="@lang('translations.access.register.address')" name="address" required>
                    <input class="access-form-phone" type="tel" placeholder="@lang('translations.access.register.phone')" name="phone" required>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(2)" class="access-form-submit">@lang('translations.access.register.next')</button>
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                    <p class="form-error">Faltan campos por completar</p>

                </div>

                <div class="step step-hidden" id="step-content3">
                    <input class="access-form-username" type="text" placeholder="@lang('translations.access.register.username')" name="username" required>
                    <input class="access-form-password" type="password" placeholder="@lang('translations.access.register.password')" name="password" required>
                    <div class="row">
                        <div class="col-10">
                            <button onclick="nextStep(3)" class="access-form-submit">@lang('translations.access.register.next')</button>                        
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                <p class="form-error">Faltan campos por completar</p>

                </div>
                <div class="step step-hidden" id="step-content4">
                    <select class="access-form-select"  name="country_id">
                        <option value="204">España</option>
                        <option>Portugal</option>
                    </select>
                    <div class="row">
                        <div class="col-10">
                            <input class="access-form-submit" type="submit" value="@lang('translations.access.register.title')">
                        </div>
                        <div class="col-2">
                            <img class="access-form-google" src="{{ asset('icons/google.svg') }}" alt="@lang('translations.access.login.google')">
                        </div>
                    </div>
                <p class="form-error">Faltan campos por completar</p>

                </div>
                <div class="row d-flex form-step-container">
                    <div class="col-3"><hr class="form-step-active" id="step1" onclick="goToStep(1)"></div>
                    <div class="col-3"><hr class="form-step" id="step2" onclick="goToStep(2)"></div>
                    <div class="col-3"><hr class="form-step" id="step3" onclick="goToStep(3)"></div>
                    <div class="col-3"><hr class="form-step" id="step4" onclick="goToStep(4)"></div>
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

        for (let i = 1; i <= 4; i++) {
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

    showStep(step);
}



function nextStep(step) {
    event.preventDefault();

    const stepContainer = document.getElementById(`step-content${step}`);
    const errorMsg = stepContainer.querySelector('.form-error');
    const currentFields = stepContainer.querySelectorAll('input, select');
    let allValid = true;

    currentFields.forEach(field => {
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
        const next = step + 1;
        if (next <= 4) {
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
}
.form-step-active {
    background-color: #007bff;
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


</style>