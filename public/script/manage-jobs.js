// CareerLink - Manage Jobs JS
(function () {
  var menuToggle = document.getElementById('menu-toggle');
  var nav = document.getElementById('primary-nav');
  if (menuToggle && nav) {
    menuToggle.addEventListener('click', function () {
      nav.classList.toggle('nav-open');
    });
  }

  var applyBtn = document.getElementById('applyFilters');
  if (applyBtn) {
    applyBtn.addEventListener('click', function () {
      var table = document.getElementById('jobsTable');
      if (table) {
        table.style.opacity = 0.5;
        setTimeout(function () { table.style.opacity = 1; }, 400);
      }
    });
  }

  document.querySelectorAll('.page-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      btn.classList.add('page-loading');
      setTimeout(function () { btn.classList.remove('page-loading'); }, 300);
    });
  });

  document.querySelectorAll('.btn').forEach(function(btn) {
    btn.addEventListener('focus', function() { btn.style.outline = '2px solid #667eea'; btn.style.outlineOffset = '2px'; });
    btn.addEventListener('blur', function() { btn.style.outline = 'none'; });
  });
})();
