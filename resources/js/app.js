window.togglePassword = function (id, button) {
    const input = document.getElementById(id);

    if (!input) return;

    if (input.type === "password") {
        input.type = "text";
        button.classList.add("transition", "duration-200");
        button.textContent = "🙈";
    } else {
        input.type = "password";
        button.classList.add("transition", "duration-200");
        button.textContent = "👁️";
    }
};
