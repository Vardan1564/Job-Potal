// Landing Common Scripts (User + Company)
// - Menu toggle
// - Account dropdown toggle + outside click
// - Optional user search handler if #userSearchForm exists

(function () {
    const menuToggleButton = document.getElementById("menu-toggle");
    const nav = document.getElementById("primary-nav");
    if (menuToggleButton && nav) {
        menuToggleButton.addEventListener("click", function () {
            nav.classList.toggle("nav-open");
        });
    }

    function wireDropdown(toggleId, menuId) {
        const toggle = document.getElementById(toggleId);
        const menu = document.getElementById(menuId);
        if (!toggle || !menu) return;
        toggle.addEventListener("click", function (e) {
            e.stopPropagation();
            const isOpen = menu.classList.toggle("open");
            toggle.setAttribute("aria-expanded", String(isOpen));
        });
        document.addEventListener("click", function (e) {
            if (!menu.contains(e.target) && e.target !== toggle) {
                menu.classList.remove("open");
                toggle.setAttribute("aria-expanded", "false");
            }
        });
    }

    // Try both user and company dropdown ids (whichever exists)
    wireDropdown("accountToggle", "accountMenu");
    wireDropdown("companyAccountToggle", "companyAccountMenu");

    // Optional: user quick search form handler
    const form = document.getElementById("userSearchForm");
    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const title = /** @type {HTMLInputElement} */(document.getElementById("job-title"))?.value?.trim();
            const location = /** @type {HTMLInputElement} */(document.getElementById("location"))?.value?.trim();
            if (!title || !location) {
                alert("Please enter both job title and location.");
                return;
            }
            alert(`Searching for "${title}" jobs in ${location}...`);
        });
    }
})();


