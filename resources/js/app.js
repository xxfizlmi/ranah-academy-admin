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

window.toggleSidebar = function (forceOpen) {
    const body = document.body;
    const sidebar = document.getElementById('sidebar');
    const backdrop = document.getElementById('sidebarBackdrop');
    const isDesktop = window.matchMedia('(min-width: 768px)').matches;

    if (!sidebar || !backdrop) return;

    if (isDesktop) {
        if (typeof forceOpen === 'boolean') {
            body.classList.toggle('sidebar-closed-desktop', !forceOpen);
        } else {
            body.classList.toggle('sidebar-closed-desktop');
        }
        body.classList.remove('sidebar-open');
        sidebar.classList.remove('-translate-x-full');
        backdrop.classList.add('hidden');
    } else {
        if (typeof forceOpen === 'boolean') {
            body.classList.toggle('sidebar-open', forceOpen);
        } else {
            body.classList.toggle('sidebar-open');
        }
        sidebar.classList.toggle('-translate-x-full', !body.classList.contains('sidebar-open'));
        backdrop.classList.toggle('hidden', !body.classList.contains('sidebar-open'));
    }
};
