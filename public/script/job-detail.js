// Job Detail page script - handles navigation and basic interactions
// Content is static HTML, no dynamic rendering needed

(function () {
    // Navigation & account dropdown
    var menuToggle = document.getElementById("menu-toggle");
    var nav = document.getElementById("primary-nav");
    if (menuToggle && nav) {
        menuToggle.addEventListener("click", function () {
            var isOpen = nav.classList.toggle("nav-open");
            menuToggle.setAttribute("aria-expanded", String(isOpen));
        });
    }
    
    var accountToggle = document.getElementById("accountToggle");
    var accountMenu = document.getElementById("accountMenu");
    if (accountToggle && accountMenu) {
        accountToggle.addEventListener("click", function (e) {
            e.stopPropagation();
            var isOpen = accountMenu.classList.toggle("open");
            accountToggle.setAttribute("aria-expanded", String(isOpen));
        });
        document.addEventListener("click", function (e) {
            if (!accountMenu.contains(e.target) && e.target !== accountToggle) {
                accountMenu.classList.remove("open");
                accountToggle.setAttribute("aria-expanded", "false");
            }
        });
    }

    // Smooth scroll for internal links (if any)
    var internalLinks = document.querySelectorAll('a[href^="#"]');
    internalLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading state to apply button (optional enhancement)
    var applyBtn = document.querySelector('.btn-primary');
    if (applyBtn) {
        applyBtn.addEventListener('click', function(e) {
            // Add a subtle loading effect
            this.style.opacity = '0.7';
            this.style.pointerEvents = 'none';
            
            // Reset after a short delay (in real app, this would be handled by form submission)
            setTimeout(function() {
                applyBtn.style.opacity = '1';
                applyBtn.style.pointerEvents = 'auto';
            }, 1000);
        });
    }

    // Print functionality (optional)
    var printBtn = document.createElement('button');
    printBtn.textContent = 'Print Job Details';
    printBtn.className = 'btn btn-outline';
    printBtn.style.marginTop = '16px';
    printBtn.addEventListener('click', function() {
        window.print();
    });
    
    // Add print button to sidebar if it exists
    var sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        var lastCard = sidebar.querySelector('.info-card:last-child');
        if (lastCard) {
            lastCard.appendChild(printBtn);
        }
    }
})();

