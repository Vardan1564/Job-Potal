// Job Analytics Dashboard Scripts
// - Interactive charts and data visualization
// - Form handlers for salary calculator and market comparison
// - Real-time data updates and animations
// - Maintains consistent behavior with existing project patterns

(function () {
    'use strict';

    // ===== SALARY CALCULATOR =====
    const salaryCalculator = document.getElementById('salaryCalculator');
    if (salaryCalculator) {
        salaryCalculator.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const role = document.getElementById('calcRole').value;
            const experience = document.getElementById('calcExperience').value;
            const location = document.getElementById('calcLocation').value;
            
            // Simulate salary calculation based on inputs
            const salaryData = calculateSalary(role, experience, location);
            
            // Show result with animation
            showSalaryResult(salaryData);
            
            // Show notification
            if (window.showNotification) {
                window.showNotification('Salary calculated successfully!', 'success');
            }
        });
    }

    function calculateSalary(role, experience, location) {
        // Base salary ranges by role (in LPA)
        const baseSalaries = {
            'software': { min: 6, max: 18 },
            'data': { min: 7, max: 20 },
            'design': { min: 5, max: 15 },
            'product': { min: 8, max: 25 }
        };
        
        // Experience multipliers
        const experienceMultipliers = {
            '0-2': { min: 0.7, max: 0.9 },
            '3-5': { min: 1.0, max: 1.3 },
            '6-10': { min: 1.4, max: 1.8 },
            '10+': { min: 1.9, max: 2.5 }
        };
        
        // Location multipliers
        const locationMultipliers = {
            'bangalore': 1.0,
            'mumbai': 1.1,
            'delhi': 1.05,
            'remote': 0.9
        };
        
        const base = baseSalaries[role] || baseSalaries['software'];
        const expMult = experienceMultipliers[experience] || experienceMultipliers['3-5'];
        const locMult = locationMultipliers[location] || 1.0;
        
        const minSalary = Math.round(base.min * expMult.min * locMult);
        const maxSalary = Math.round(base.max * expMult.max * locMult);
        
        return {
            min: minSalary,
            max: maxSalary,
            role: role,
            experience: experience,
            location: location
        };
    }

    function showSalaryResult(data) {
        const resultDiv = document.getElementById('salaryResult');
        const minSpan = document.getElementById('salaryMin');
        const maxSpan = document.getElementById('salaryMax');
        
        if (resultDiv && minSpan && maxSpan) {
            minSpan.textContent = `₹${data.min}L`;
            maxSpan.textContent = `₹${data.max}L`;
            
            resultDiv.style.display = 'block';
            resultDiv.style.opacity = '0';
            resultDiv.style.transform = 'translateY(20px)';
            
            // Animate in
            setTimeout(() => {
                resultDiv.style.transition = 'all 0.5s ease';
                resultDiv.style.opacity = '1';
                resultDiv.style.transform = 'translateY(0)';
            }, 100);
        }
    }

    // ===== MARKET COMPARISON =====
    const marketComparison = document.getElementById('marketComparison');
    if (marketComparison) {
        marketComparison.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const role = document.getElementById('compRole').value.trim();
            const skills = document.getElementById('compSkills').value.trim();
            const experience = parseInt(document.getElementById('compExperience').value);
            
            if (!role || !skills || !experience) {
                if (window.showNotification) {
                    window.showNotification('Please fill in all fields.', 'warning');
                }
                return;
            }
            
            // Simulate market analysis
            const analysis = performMarketAnalysis(role, skills, experience);
            showComparisonResult(analysis);
            
            if (window.showNotification) {
                window.showNotification('Market analysis completed!', 'success');
            }
        });
    }

    function performMarketAnalysis(role, skills, experience) {
        // Simulate market fit calculation
        const marketFit = Math.min(95, Math.max(60, 70 + (experience * 3) + Math.random() * 20));
        const salaryRange = calculateSalaryRange(role, experience);
        
        return {
            marketFit: Math.round(marketFit),
            salaryRange: salaryRange,
            role: role,
            experience: experience
        };
    }

    function calculateSalaryRange(role, experience) {
        const baseRanges = {
            'Frontend Developer': { min: 4, max: 12 },
            'Backend Developer': { min: 5, max: 15 },
            'Full Stack Developer': { min: 6, max: 18 },
            'Data Scientist': { min: 7, max: 20 },
            'UI/UX Designer': { min: 4, max: 12 },
            'Product Manager': { min: 8, max: 25 }
        };
        
        const range = baseRanges[role] || baseRanges['Frontend Developer'];
        const expMultiplier = Math.min(2.0, 0.5 + (experience * 0.15));
        
        return {
            min: Math.round(range.min * expMultiplier),
            max: Math.round(range.max * expMultiplier)
        };
    }

    function showComparisonResult(analysis) {
        const resultDiv = document.getElementById('comparisonResult');
        if (!resultDiv) return;
        
        // Update market fit bar
        const marketFitBar = resultDiv.querySelector('.metric-fill');
        if (marketFitBar) {
            marketFitBar.style.width = `${analysis.marketFit}%`;
        }
        
        // Update salary range
        const salaryValue = resultDiv.querySelector('.metric-value');
        if (salaryValue) {
            salaryValue.textContent = `₹${analysis.salaryRange.min}L - ₹${analysis.salaryRange.max}L`;
        }
        
        resultDiv.style.display = 'block';
        resultDiv.style.opacity = '0';
        resultDiv.style.transform = 'translateY(20px)';
        
        // Animate in
        setTimeout(() => {
            resultDiv.style.transition = 'all 0.5s ease';
            resultDiv.style.opacity = '1';
            resultDiv.style.transform = 'translateY(0)';
        }, 100);
    }

    // ===== CHART FILTERS =====
    const roleFilter = document.getElementById('roleFilter');
    const experienceFilter = document.getElementById('experienceFilter');
    
    if (roleFilter) {
        roleFilter.addEventListener('change', function () {
            updateSalaryChart(this.value, experienceFilter?.value || 'all');
        });
    }
    
    if (experienceFilter) {
        experienceFilter.addEventListener('change', function () {
            updateSalaryChart(roleFilter?.value || 'all', this.value);
        });
    }

    function updateSalaryChart(role, experience) {
        const chartBars = document.querySelectorAll('.bar-fill');
        const barValues = document.querySelectorAll('.bar-value');
        
        // Simulate data update based on filters
        const salaryData = generateSalaryData(role, experience);
        
        chartBars.forEach((bar, index) => {
            if (salaryData[index]) {
                const percentage = (salaryData[index].value / 20) * 100; // Assuming max salary of 20L
                bar.style.width = `${Math.min(100, percentage)}%`;
                
                if (barValues[index]) {
                    barValues[index].textContent = `₹${salaryData[index].value}L`;
                }
            }
        });
        
        if (window.showNotification) {
            window.showNotification(`Chart updated for ${role} roles`, 'info');
        }
    }

    function generateSalaryData(role, experience) {
        // Simulate different salary data based on filters
        const baseData = [
            { name: 'Software Engineer', value: 12.5 },
            { name: 'Data Scientist', value: 11.2 },
            { name: 'Product Manager', value: 14.8 },
            { name: 'UI/UX Designer', value: 8.9 },
            { name: 'DevOps Engineer', value: 13.1 }
        ];
        
        // Apply filters
        let multiplier = 1.0;
        if (experience === 'entry') multiplier = 0.6;
        else if (experience === 'mid') multiplier = 1.0;
        else if (experience === 'senior') multiplier = 1.4;
        
        if (role === 'software') {
            return baseData.map(item => ({
                ...item,
                value: item.value * multiplier
            }));
        } else if (role === 'data') {
            return baseData.map(item => ({
                ...item,
                value: (item.value * 0.9) * multiplier
            }));
        }
        
        return baseData.map(item => ({
            ...item,
            value: item.value * multiplier
        }));
    }

    // ===== ANIMATIONS =====
    
    // Animate bars on page load
    function animateBars() {
        const bars = document.querySelectorAll('.bar-fill, .demand-fill, .impact-fill, .metric-fill');
        
        bars.forEach((bar, index) => {
            const originalWidth = bar.style.width;
            bar.style.width = '0%';
            
            setTimeout(() => {
                bar.style.transition = 'width 1.5s ease';
                bar.style.width = originalWidth;
            }, index * 200);
        });
    }

    // Animate statistics on scroll
    function animateStats() {
        const statNumbers = document.querySelectorAll('.stat-card h3, .stat-number');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateNumber(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        statNumbers.forEach(stat => {
            observer.observe(stat);
        });
    }

    function animateNumber(element) {
        const finalNumber = parseFloat(element.textContent.replace(/[^\d.]/g, ''));
        if (isNaN(finalNumber)) return;
        
        const duration = 2000;
        const increment = finalNumber / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= finalNumber) {
                element.textContent = element.textContent.replace(/\d+\.?\d*/, finalNumber.toFixed(1));
                clearInterval(timer);
            } else {
                const displayValue = Math.floor(current * 10) / 10;
                element.textContent = element.textContent.replace(/\d+\.?\d*/, displayValue.toFixed(1));
            }
        }, 16);
    }

    // ===== INTERACTIVE ELEMENTS =====
    
    // Add hover effects to trend cards
    function addHoverEffects() {
        const trendCards = document.querySelectorAll('.trend-card, .insight-card, .tool-card');
        
        trendCards.forEach(card => {
            card.addEventListener('mouseenter', function () {
                this.style.transform = 'translateY(-8px)';
            });
            
            card.addEventListener('mouseleave', function () {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    // Add click effects to interactive elements
    function addClickEffects() {
        const interactiveElements = document.querySelectorAll('.skill-item, .location-item, .sector-item, .time-item, .factor-item');
        
        interactiveElements.forEach(element => {
            element.addEventListener('click', function () {
                // Add ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(52, 152, 219, 0.3);
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    pointer-events: none;
                `;
                
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = (event.clientX - rect.left - size / 2) + 'px';
                ripple.style.top = (event.clientY - rect.top - size / 2) + 'px';
                
                this.style.position = 'relative';
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    }

    // ===== DATA REFRESH =====
    
    // Simulate real-time data updates
    function startDataRefresh() {
        setInterval(() => {
            // Update random statistics
            const statCards = document.querySelectorAll('.stat-card h3');
            statCards.forEach(card => {
                const currentValue = parseInt(card.textContent.replace(/[^\d]/g, ''));
                const change = Math.floor(Math.random() * 3) - 1; // -1, 0, or 1
                const newValue = Math.max(0, currentValue + change);
                
                if (change !== 0) {
                    card.textContent = card.textContent.replace(/\d+/, newValue);
                    
                    // Add visual indicator
                    const changeIndicator = card.parentNode.querySelector('.stat-change');
                    if (changeIndicator) {
                        changeIndicator.textContent = change > 0 ? `+${change}%` : `${change}%`;
                        changeIndicator.className = `stat-change ${change > 0 ? 'positive' : 'negative'}`;
                    }
                }
            });
        }, 30000); // Update every 30 seconds
    }

    // ===== INITIALIZATION =====
    
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize animations
        setTimeout(animateBars, 500);
        animateStats();
        
        // Add interactive effects
        addHoverEffects();
        addClickEffects();
        
        // Start data refresh (optional)
        // startDataRefresh();
        
        // Add CSS for ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        console.log('Job Analytics Dashboard initialized');
    });

    // ===== EXPORT FUNCTIONS =====
    
    // Make functions available globally for potential external use
    window.jobAnalytics = {
        calculateSalary,
        performMarketAnalysis,
        updateSalaryChart,
        animateBars,
        animateStats
    };

})();

