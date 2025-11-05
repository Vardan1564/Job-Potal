// CareerLink - Admin Dashboard JS
// Minimal interactive behavior: menu toggle and demo KPI animation
(function () {
  // MENU TOGGLE
  var menuToggle = document.getElementById('menu-toggle');
  var nav = document.getElementById('primary-nav');
  if (menuToggle && nav) {
    menuToggle.addEventListener('click', function () {
      nav.classList.toggle('nav-open');
    });
  }

  // DEMO: KPI number 'count up' animation for visual polish
  function countUp(el, finalValue) {
    var current = 0;
    var step = Math.ceil(finalValue / 30);
    var interval = setInterval(function () {
      current += step;
      if (current >= finalValue) {
        current = finalValue;
        clearInterval(interval);
      }
      el.textContent = current.toLocaleString();
    }, 30);
  }
  var usersEl = document.getElementById('kpiUsers');
  var companiesEl = document.getElementById('kpiCompanies');
  var jobsEl = document.getElementById('kpiJobs');
  var newEl = document.getElementById('kpiNew');
  if (usersEl && companiesEl && jobsEl && newEl) {
    countUp(usersEl, 8420);
    countUp(companiesEl, 1245);
    countUp(jobsEl, 2310);
    countUp(newEl, 127);
  }

  // ACCESSIBLE BUTTON FOCUS OUTLINE
  document.querySelectorAll('.btn').forEach(function(btn) {
    btn.addEventListener('focus', function() {
      btn.style.outline = '2px solid #667eea';
      btn.style.outlineOffset = '2px';
    });
    btn.addEventListener('blur', function() {
      btn.style.outline = 'none';
    });
  });
})();
