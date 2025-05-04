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