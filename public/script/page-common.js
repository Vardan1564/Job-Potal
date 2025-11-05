// Page Common Scripts
// - Shared functionality for all new pages (user-apply, user-applications, internships, company-post-job, company-view-jobs)
// - Extends landing-common.js with page-specific interactions
// - Maintains consistent behavior across the application

(function () {
    'use strict';

    // ===== FORM HANDLERS =====
    
    // Job Search Form (user-apply.html)
    const jobSearchForm = document.getElementById('jobSearchForm');
    if (jobSearchForm) {
        jobSearchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const title = document.getElementById('job-title')?.value?.trim();
            const location = document.getElementById('location')?.value?.trim();
            const experience = document.getElementById('experience')?.value;
            
            if (!title || !location) {
                showNotification('Please enter both job title and location.', 'warning');
                return;
            }
            
            // Simulate search
            showNotification(`Searching for "${title}" jobs in ${location}...`, 'info');
            
            // In a real app, this would make an API call
            setTimeout(() => {
                showNotification('Found 12 matching jobs!', 'success');
            }, 1500);
        });
    }

    // Internship Search Form (internships.html)
    const internshipSearchForm = document.getElementById('internshipSearchForm');
    if (internshipSearchForm) {
        internshipSearchForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const role = document.getElementById('internship-role')?.value?.trim();
            const location = document.getElementById('internship-location')?.value?.trim();
            const duration = document.getElementById('duration')?.value;
            
            if (!role || !location) {
                showNotification('Please enter both role and location.', 'warning');
                return;
            }
            
            showNotification(`Searching for "${role}" internships in ${location}...`, 'info');
            
            setTimeout(() => {
                showNotification('Found 8 matching internships!', 'success');
            }, 1500);
        });
    }

    // Job Post Form (company-post-job.html)
    const jobPostForm = document.getElementById('jobPostForm');
    if (jobPostForm) {
        jobPostForm.addEventListener('submit', function (e) {
            e.preventDefault();
            
            // Validate required fields
            const requiredFields = ['job-title', 'location', 'job-type', 'experience-level', 'job-description', 'requirements', 'company-name'];
            const missingFields = [];
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field || !field.value.trim()) {
                    missingFields.push(fieldId.replace('-', ' '));
                }
            });
            
            if (missingFields.length > 0) {
                showNotification(`Please fill in: ${missingFields.join(', ')}`, 'warning');
                return;
            }
            
            // Simulate job posting
            showNotification('Posting your job...', 'info');
            
            setTimeout(() => {
                showNotification('Job posted successfully! It will be live within 24 hours.', 'success');
                jobPostForm.reset();
            }, 2000);
        });
    }

    // ===== FILTER HANDLERS =====
    
    // Application Status Filter (user-applications.html)
    const statusFilter = document.getElementById('status-filter');
    if (statusFilter) {
        statusFilter.addEventListener('change', function () {
            const selectedStatus = this.value;
            filterApplications(selectedStatus);
        });
    }

    // Job Status Filter (company-view-jobs.html)
    const jobStatusFilter = document.getElementById('status-filter');
    if (jobStatusFilter) {
        jobStatusFilter.addEventListener('change', function () {
            const selectedStatus = this.value;
            filterJobs(selectedStatus);
        });
    }

    // ===== APPLICATION FILTERING =====
    function filterApplications(status) {
        const applications = document.querySelectorAll('.application-item');
        
        applications.forEach(app => {
            if (status === 'all') {
                app.style.display = 'block';
            } else {
                const appStatus = app.querySelector('.status').classList[1]; // Get second class (status-xxx)
                const statusClass = `status-${status}`;
                
                if (appStatus === statusClass) {
                    app.style.display = 'block';
                } else {
                    app.style.display = 'none';
                }
            }
        });
        
        showNotification(`Showing ${status === 'all' ? 'all' : status} applications`, 'info');
    }

    // ===== JOB FILTERING =====
    function filterJobs(status) {
        const jobs = document.querySelectorAll('.job-management-item');
        
        jobs.forEach(job => {
            if (status === 'all') {
                job.style.display = 'block';
            } else {
                const jobStatus = job.querySelector('.job-status').classList[1]; // Get second class (status-xxx)
                const statusClass = `status-${status}`;
                
                if (jobStatus === statusClass) {
                    job.style.display = 'block';
                } else {
                    job.style.display = 'none';
                }
            }
        });
        
        showNotification(`Showing ${status === 'all' ? 'all' : status} jobs`, 'info');
    }

    // ===== NOTIFICATION SYSTEM =====
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notif => notif.remove());
        
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <span class="notification-message">${message}</span>
                <button class="notification-close">&times;</button>
            </div>
        `;
        
        // Add styles
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            background: ${getNotificationColor(type)};
            color: white;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            transform: translateX(100%);
            transition: transform 0.3s ease;
            max-width: 400px;
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            removeNotification(notification);
        }, 5000);
        
        // Close button handler
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.addEventListener('click', () => {
            removeNotification(notification);
        });
    }
    
    function removeNotification(notification) {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }
    
    function getNotificationColor(type) {
        const colors = {
            'success': '#27ae60',
            'warning': '#f39c12',
            'error': '#e74c3c',
            'info': '#3498db'
        };
        return colors[type] || colors['info'];
    }

    // ===== JOB ACTIONS =====
    
    // Apply Now buttons
    document.addEventListener('click', function (e) {
        if (e.target.textContent === 'Apply Now') {
            e.preventDefault();
            showNotification('Redirecting to application form...', 'info');
            
            // In a real app, this would redirect to the application form
            setTimeout(() => {
                showNotification('Application form opened!', 'success');
            }, 1000);
        }
        
        
        if (e.target.textContent === 'Prepare for Interview') {
            e.preventDefault();
            showNotification('Opening interview preparation resources...', 'info');
        }
        
        if (e.target.textContent === 'Review Offer') {
            e.preventDefault();
            showNotification('Opening offer details...', 'info');
        }
    });

    // ===== FORM VALIDATION HELPERS =====
    
    // Real-time validation for job post form
    const jobPostInputs = document.querySelectorAll('#jobPostForm input, #jobPostForm textarea, #jobPostForm select');
    jobPostInputs.forEach(input => {
        input.addEventListener('blur', function () {
            validateField(this);
        });
        
        input.addEventListener('input', function () {
            clearFieldError(this);
        });
    });
    
    function validateField(field) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        
        if (isRequired && !value) {
            showFieldError(field, 'This field is required');
            return false;
        }
        
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                showFieldError(field, 'Please enter a valid email address');
                return false;
            }
        }
        
        // URL validation
        if (field.type === 'url' && value) {
            try {
                new URL(value);
            } catch {
                showFieldError(field, 'Please enter a valid URL');
                return false;
            }
        }
        
        clearFieldError(field);
        return true;
    }
    
    function showFieldError(field, message) {
        clearFieldError(field);
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        errorDiv.style.cssText = 'color: #e74c3c; font-size: 0.85rem; margin-top: 5px;';
        
        field.style.borderColor = '#e74c3c';
        field.parentNode.appendChild(errorDiv);
    }
    
    function clearFieldError(field) {
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
            existingError.remove();
        }
        field.style.borderColor = '#e1e8ed';
    }

    // ===== STATISTICS ANIMATION =====
    
    // Animate statistics on page load
    const statNumbers = document.querySelectorAll('.stat-card h3, .stat .number');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateNumber(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });
    
    statNumbers.forEach(stat => {
        observer.observe(stat);
    });
    
    function animateNumber(element) {
        const finalNumber = parseInt(element.textContent);
        const duration = 2000;
        const increment = finalNumber / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= finalNumber) {
                element.textContent = finalNumber;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    // ===== INITIALIZATION =====
    
    // Initialize page-specific features
    document.addEventListener('DOMContentLoaded', function () {
        // Page initialization complete
    });

})();





