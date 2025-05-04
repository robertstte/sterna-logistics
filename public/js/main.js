function showFormPassword()
{
    const loginPassword = document.getElementById("login-password");
    const loginTogglePassword = document.getElementById('login-toggle-password')

    if (loginPassword.type === "password") {
        loginPassword.type = "text";
        loginTogglePassword.src = loginTogglePassword.getAttribute("data-eye-off");
    } else {
        loginPassword.type = "password";
        loginTogglePassword.src = loginTogglePassword.getAttribute("data-eye");
    }
}

var currentStep = 1;

function nextStep(step) 
{
    document.getElementById("step-content" + step).classList.add("step-hidden");
    document.getElementById("step-content" + (step + 1)).classList.remove("step-hidden");

    document.getElementById("step" + step).classList.add("form-step");
    document.getElementById("step" + step).classList.remove("form-step-active");
    
    document.getElementById("step" + (step + 1)).classList.remove("form-step");
    document.getElementById("step" + (step + 1)).classList.add("form-step-active");

    currentStep++;
}

function previousStep(step) {
    document.getElementById("step-content" + step).classList.add("step-hidden");
    document.getElementById("step-content" + (step - 1)).classList.remove("step-hidden");
}