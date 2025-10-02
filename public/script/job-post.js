(function () {
    // Menu toggle
    var menuToggle = document.getElementById("menu-toggle");
    var nav = document.getElementById("primary-nav");
    if (menuToggle && nav) {
        menuToggle.addEventListener("click", function () {
            var isOpen = nav.classList.toggle("nav-open");
            menuToggle.setAttribute("aria-expanded", String(isOpen));
        });
    }

    // Account dropdown
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

    // Form handling
    /** @type {HTMLFormElement|null} */
    var form = document.getElementById("jobPostForm");
    var saveDraftBtn = document.getElementById("saveDraftBtn");

    function setError(id, message) {
        var el = document.getElementById(id);
        if (el) el.textContent = message || "";
    }

    function validateForm() {
        var valid = true;
        var jobTitle = /** @type {HTMLInputElement} */(document.getElementById("jobTitle")).value.trim();
        var location = /** @type {HTMLInputElement} */(document.getElementById("location")).value.trim();
        var jobType = /** @type {HTMLSelectElement} */(document.getElementById("jobType")).value.trim();
        var jobDescription = /** @type {HTMLTextAreaElement} */(document.getElementById("jobDescription")).value.trim();
        var qualifications = /** @type {HTMLTextAreaElement} */(document.getElementById("qualifications")).value.trim();
        var companyName = /** @type {HTMLInputElement} */(document.getElementById("companyName")).value.trim();

        setError("jobTitleError", "");
        setError("locationError", "");
        setError("jobTypeError", "");
        setError("jobDescriptionError", "");
        setError("qualificationsError", "");
        setError("companyNameError", "");

        if (!jobTitle) { setError("jobTitleError", "Job title is required."); valid = false; }
        if (!location) { setError("locationError", "Location is required."); valid = false; }
        if (!jobType) { setError("jobTypeError", "Please select a job type."); valid = false; }
        if (!jobDescription) { setError("jobDescriptionError", "Please add a job description."); valid = false; }
        if (!qualifications) { setError("qualificationsError", "Please provide qualifications."); valid = false; }
        if (!companyName) { setError("companyNameError", "Company name is required."); valid = false; }
        return valid;
    }

    function collectData() {
        return {
            jobtitle: /** @type {HTMLInputElement} */(document.getElementById("jobTitle")).value.trim(),
            city: /** @type {HTMLInputElement} */(document.getElementById("location")).value.trim(),
            jobtype: /** @type {HTMLSelectElement} */(document.getElementById("jobType")).value.trim(),
            experience_level: /** @type {HTMLSelectElement} */(document.getElementById("experienceLevel")).value.trim(),
            job_description: /** @type {HTMLTextAreaElement} */(document.getElementById("jobDescription")).value.trim(),
            qualifications: /** @type {HTMLTextAreaElement} */(document.getElementById("qualifications")).value.trim(),
            company_name: /** @type {HTMLInputElement} */(document.getElementById("companyName")).value.trim(),
            job_deadline: /** @type {HTMLInputElement} */(document.getElementById("applicationDeadline")).value,
            salary_range: /** @type {HTMLInputElement} */(document.getElementById("salaryRange")).value.trim(),
            email: /** @type {HTMLInputElement} */(document.getElementById("hiringEmail")).value.trim()
        };
    }


    function saveDraft(data) {
        try {
            localStorage.setItem("jobPostDraft", JSON.stringify(data));
            alert("Draft saved locally.");
        } catch (err) {
            alert("Unable to save draft locally.");
        }
    }

    function loadDraft() {
        try {
            var raw = localStorage.getItem("jobPostDraft");
            if (!raw) return;
            var d = JSON.parse(raw);
            [
                ["jobTitle", d.jobtitle],
                ["location", d.city],
                ["jobType", d.jobtype],
                ["experienceLevel", d.experience_level],
                ["jobDescription", d.job_description],
                ["qualifications", d.qualifications],
                ["companyName", d.company_name],
                ["applicationDeadline", d.job_deadline],
                ["salaryRange", d.salary_range],
                ["hiringEmail", d.email]
            ].forEach(function (pair) {
                var el = document.getElementById(pair[0]);
                if (el && typeof pair[1] === "string") {
                    el.value = pair[1];
                }
            });
        } catch (_) { /* ignore */ }
    }

    if (saveDraftBtn) {
        saveDraftBtn.addEventListener("click", function () {
            saveDraft(collectData());
        });
    }

    if (form) {
        loadDraft();
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            if (!validateForm()) return;
            // Form will be submitted normally to the server
            form.submit();
        });
    }
})();



