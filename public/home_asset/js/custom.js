document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll('[data-bs-toggle="collapse"]')
        .forEach(function (toggle) {
            toggle.addEventListener("click", function () {
                let icon = this.querySelector(".toggle-icon");
                if (icon) {
                    setTimeout(() => {
                        icon.classList.toggle(
                            "fa-chevron-circle-down",
                            !this.classList.contains("collapsed")
                        );
                        icon.classList.toggle(
                            "fa-chevron-circle-up",
                            this.classList.contains("collapsed")
                        );
                    }, 150); // Delay to sync with collapse animation
                }
            });
        });
});
