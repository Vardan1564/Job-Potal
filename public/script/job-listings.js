(function () {
    const menuToggle = document.getElementById("menu-toggle");
    const nav = document.getElementById("primary-nav");
    if (menuToggle && nav) {
      menuToggle.addEventListener("click", () => {
        const isOpen = nav.classList.toggle("nav-open");
        menuToggle.setAttribute("aria-expanded", String(isOpen));
      });
    }
  
    const accountToggle = document.getElementById("accountToggle");
    const accountMenu = document.getElementById("accountMenu");
    if (accountToggle && accountMenu) {
      accountToggle.addEventListener("click", e => {
        e.stopPropagation();
        const isOpen = accountMenu.classList.toggle("open");
        accountToggle.setAttribute("aria-expanded", String(isOpen));
      });
      document.addEventListener("click", e => {
        if (!accountMenu.contains(e.target) && e.target !== accountToggle) {
          accountMenu.classList.remove("open");
          accountToggle.setAttribute("aria-expanded", "false");
        }
      });
    }
  })();
  